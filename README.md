# Corals Payment Twocheckout
* Laravel 2Checkout subscriptions Plugin for the Laraship platform is an amazing option for handling recurring billing for 2Checkout. integrate 2Checkout seamlessly with Laraship Subscription Platform, You can enable it along with other subscription gateways like stripe which is already built in with Laraship Subscriptions platform or configure it as a standalone payment gateway.
* 2Checkout powerful API gives users the huge flexibility to create a payment for 2Checkout Subscriptions scenarios that fit their business needs the most. Streamline the payment process and provide your customers with the superior user experience. charge one card multiple times, without asking a customer for the details.

### – Setup Seller ID, Publishable Key, and Private Key

<p>&nbsp;</p>
Your 2Checkout Seller ID (also known as: SID, vendor ID, merchant ID, account ID) can be found in your vendor area, and is located in the upper-right corner of the screen:
<p>&nbsp;</p>

<p><img src="https://www.laraship.com/wp-content/uploads/2018/05/2checkout-merchant_id.png"></p>
<p>&nbsp;</p>

Your Publishable Key and your Private Key can be found in your API area

### 2Checkout Username and Password
You need to create a new user in your 2Checkout account and give them API access

<p><img src="https://www.laraship.com/wp-content/uploads/2018/05/2checkout-create_user.png"></p>
<p>&nbsp;</p>

<p><img src="https://www.laraship.com/wp-content/uploads/2018/05/2checkout-create_user-2.png"></p>
<p>&nbsp;</p>

### 2Checkout Webhooks :
Webhooks are important to keep your Laraship up to date and in sync with the invoices and subscriptions status

1. go to https://www.2checkout.com/va/notifications/

2. Add 
  Global URL which should be https://[you-domain.com]/webhooks/twocheckout

3. enable the following events:

- Recurring Restarted

- Recurring Complete

- Recurring Stopped

- Recurring Installment Failed

- Invoice Status Changed

<p><img src="https://www.laraship.com/wp-content/uploads/2018/05/2checkout-webhooks.png"></p>
<p>&nbsp;</p>




## Installation

You can install the package via composer:

```bash
composer require corals/payment-twocheckout
```

## Questions & Answers
If you faced any issue you can check our questions center, and you can post your question from the following link
[Questions & Answers](https://www.laraship.com/laraship-questions/)  

## Online Documentation 
follow the [Online Docs](https://www.laraship.com/docs/laraship/payment-modules/2checkout-configuration/) to see more about this module 


## Hire Us
Looking for a professional team to build your success and start driving your business forward.
Laraship team ready to start with you [Hire Us](https://www.laraship.com/contact)


## Testing

```bash
vendor/bin/phpunit vendor/corals/payment-twocheckout/tests 
```
