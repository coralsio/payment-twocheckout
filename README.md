# Corals Payment Twocheckout

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


## Questions & Answers
If you faced any issue you can check our questions center, and you can post your question from the following link
[Questions & Answers](https://www.laraship.com/laraship-questions/)  


## Installation

You can install the package via composer:

```bash
composer require corals/payment-twocheckout
```

## Hire Us
Looking for a professional team to build your success and start driving your business forward.
Laraship team ready to start with you [Hire Us](https://www.laraship.com/contact)

## Testing

```bash
vendor/bin/phpunit vendor/corals/payment-twocheckout/tests 
```
