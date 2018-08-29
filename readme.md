# Laravel Nova Stripe Dashboard

This package makes it easy to see high-level information about your [Stripe](https://stripe.com/) balance and charges in a Nova dashboard.

Looking to manage your users' Stripe subscriptions with [Laravel Cashier](https://github.com/laravel/cashier)? Check out [Nova Cashier Manager](https://novapackages.com/packages/themsaid/nova-cashier-manager).

**This package is in alpha and under very active development, but check out the to-do section below for features we plan to add soon!**

### Installation Instructions

Install via [Composer](https://getcomposer.org/):

`$ composer require tightenco/nova-stripe`

If you have not already done so, in your `config/services.php` file, set up your Stripe key/secret:

```php
'stripe' => [
    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
],
```

and add these values to your `.env` file:

```
STRIPE_KEY=
STRIPE_SECRET=
```

From there, you can register your tools in `app/Providers/NovaServiceProvider`:

```php
public function tools()
{
    return [
        new \Tightenco\NovaStripe\NovaStripe,
    ];
}
```

### Alpha To-Dos

#### Charges Index

- [ ] Improve balance card design (including handling array of amounts in multiple currencies)
- [ ] Add ability to filter by livemode
- [ ] Add ability to filter by status
- [ ] Add ability to sort fields
- [ ] Add perPage dropdown
- [ ] Add ability to search charges

#### Charge Detail

- [ ] Calculate Stripe processing fee / net amount
- [ ] Add "Refund" button
- [ ] Better handling of booleans (green dot like regular Nova Boolean)
- [ ] Labels for statuses
- [ ] Handle Metadata more like a Textarea field
- [ ] Look for ways to refactor to use existing Nova fields if possible

#### Customers

- [ ] Add an index of customers
- [ ] Add a customer detail page

#### General Housekeeping

- [ ] Add some PHPUnit tests
- [ ] Add some Dusk tests
- [ ] Better handling of currencies (probably one DRY method to parse `$25.00 USD` instead of `(2500 / 1000).toFixed(2) usd`)
- [ ] Break navbar item into any applicable sub-items (Charges, Customers, etc.)

### Possible Beta To-Dos

- [ ] Add some pretty graphs showing earnings
- [ ] Investigate creating pseudo-resources (not relying on actual Laravel models) in order to use less custom/hard-coded code
- [ ] Add ability to update charge
- [ ] Add Payout information
- [ ] Add Stripe Connect account management
- [ ] Build cards / resource tools that can be used in Nova resources (User / Transaction / etc.?)
- [ ] Better integration with Cashier