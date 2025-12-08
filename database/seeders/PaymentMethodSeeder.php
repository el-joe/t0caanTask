<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            ['name' => 'Paypal','slug' => 'paypal', 'class' => 'PaypalPayment', 'configuration' => ['client_id' => 'your_client_id','secret' => 'your_secret'], 'required_fields' => ['client_id','secret'], 'active' => true],
            ['name' => 'Stripe', 'slug' => 'stripe', 'class' => 'StripePayment', 'configuration' => ['api_key' => 'your_api_key'], 'required_fields' => ['api_key'], 'active' => true],
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::create($method);
        }
    }
}
