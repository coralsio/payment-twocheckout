<?php

namespace Corals\Modules\Payment\TwoCheckout\Job;


use Carbon\Carbon;
use Corals\Modules\Payment\TwoCheckout\Exception\TwoCheckoutWebhookFailed;
use Corals\Modules\Payment\Common\Models\Invoice;
use Corals\Modules\Subscriptions\Models\Subscription;
use Corals\Modules\Payment\Common\Models\WebhookCall;
use Corals\User\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleRecurringFailed implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \Corals\Modules\Payment\Common\Models\WebhookCall
     */
    public $webhookCall;

    /**
     * HandleInvoiceCreated constructor.
     * @param WebhookCall $webhookCall
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }


    public function handle()
    {
        logger('Invoice Created job, webhook_call: ' . $this->webhookCall->id);

        try {

            if ($this->webhookCall->processed) {
                throw TwoCheckoutWebhookFailed::processedCall($this->webhookCall);
            }

            $payload = $this->webhookCall->payload;

            if (is_array($payload)) {

                $sale_id = $payload['sale_id'];
                $subscription = Subscription::where('subscription_reference', 'like', "$sale_id|%")->first();

                if (!$subscription) {
                    throw TwoCheckoutWebhookFailed::invalidTwoCheckoutSubscription($this->webhookCall);
                }
                $invoice = Invoice::whereCode($payload['invoice_id'])->first();

                if (!$invoice) {
                    $invoice = Invoice::create([
                        'code' => $payload['invoice_id'],
                        'currency' => $payload['list_currency'],
                        'description' => $payload['message_description'],
                        'sub_total' => $payload['item_cust_amount_1'],
                        'total' => $payload['item_cust_amount_1'],
                        'user_id' => $subscription->user_id,
                        'invoicable_id' => $subscription->id,
                        'invoicable_type' => Subscription::class,
                        'due_date' => $payload['timestamp'],
                        'invoice_date' => now(),
                    ]);
                }
                $invoice->markAsFailed();
                $this->webhookCall->markAsProcessed();
            } else {
                throw TwoCheckoutWebhookFailed::invalidTwoCheckoutPayload($this->webhookCall);
            }
        } catch (\Exception $exception) {
            log_exception($exception);
            $this->webhookCall->saveException($exception);
            throw $exception;
        }
    }
}
