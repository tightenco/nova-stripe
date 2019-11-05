<?php

namespace Tightenco\NovaStripe\Http;

use Illuminate\Routing\Controller;
use Tightenco\NovaStripe\Clients\StripeClient;

class StripeBalanceController extends Controller
{
    public function index()
    {
        $balance = (new StripeClient)->getBalance();
        $values = ['available', 'pending'];

        if (count(config('nova-stripe.currencies', []))) {
            foreach ($values as $value) {
                $balance->{$value} = collect($balance->{$value})->filter(function ($x) {
                    return in_array($x->__debugInfo()['currency'], config('nova-stripe.currencies'));
                })->toArray();
            }
        }

        return response()->json(['balance' => $balance]);
    }
}
