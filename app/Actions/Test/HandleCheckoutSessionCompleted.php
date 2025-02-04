<?php

namespace App\Actions\Test;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Cashier;
use Stripe\LineItem;
use Illuminate\Support\Facades\Log;

class HandleCheckoutSessionCompleted
{
    public function handle($sessionId)
    {
        DB::transaction(function () use ($sessionId) {
            try {
                $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
                $user = User::find($session->metadata->user_id);

                $order = $user->orders()->create([
                    'stripe_checkout_session_id' => $session->id,
                    'amount_shipping' => $session->total_details->amount_shipping,
                    'amount_discount' => $session->total_details->amount_discount,
                    'amount_tax' => $session->total_details->amount_tax,
                    'amount_subtotal' => $session->amount_subtotal,
                    'amount_total' => $session->amount_total,
                    'billing_address' => [
                        'name' => $session->customer_details->name,
                        'city' => $session->customer_details->address->city,
                        'country' => $session->customer_details->address->country,
                        'line1' => $session->customer_details->address->line1,
                        'line2' => $session->customer_details->address->line2,
                        'postal_code' => $session->customer_details->address->postal_code,
                    ],
                    'shipping_address' => [
                        'name' => $session->shipping_address->name,
                        'city' => $session->shipping_address->address->city,
                        'country' => $session->shipping_address->address->country,
                        'line1' => $session->shipping_address->address->line1,
                        'line2' => $session->shipping_address->address->line2,
                        'postal_code' => $session->shipping_address->address->postal_code,
                    ],
                ]);

                $lineItems = Cashier::stripe()->checkout->sessions->allLineItems($session->id);

                $orderItems = collect($lineItems->data)->map(function (LineItem $line) {
                    $product = Cashier::stripe()->products->retrieve($line->price->product);

                    return new OrderItem([
                        'product_variant_id' => $product->metadata->product_variant_id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $line->price->unit_amount,
                        'quantity' => $line->quantity,
                        'amount_discount' => $line->amount_discount,
                        'amount_subtotal' => $line->amount_subtotal,
                        'amount_tax' => $line->amount_tax,
                        'amount_total' => $line->amount_total,
                    ]);
                });

                $order->items()->saveMany($orderItems);
            } catch (\Exception $e) {
                Log::error('Error handli    ng checkout session: ' . $e->getMessage());
                throw $e;
            }
        });
    }
}
