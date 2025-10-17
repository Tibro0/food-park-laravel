<?php

namespace Database\Seeders;

use App\Models\PaymentGatewaySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentGatewaySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentGatewaySetting::insert([
            [
                'key' => 'paypal_logo',
                'value' => 'frontend/images/pay_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_status',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_account_mode',
                'value' => 'sandbox',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_country',
                'value' => 'US',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_currency',
                'value' => 'USD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_rate',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_api_key',
                'value' => 'ATuJHBqlMjkerCkxRbjR-25Y4-4oU3Bl8wf-M5HOe8cuwxCAehnwNSaDjbs6LDXd5Qt9yp7017pVoGjd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_secret_key',
                'value' => 'EI5A9lWJAAwHXU6JBvH0R4qU8BxMjryHyhEXNy709uXNNvk8_DarX8fXCAFtIT5J1qvSwtgzyGvAjw5i',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'paypal_app_id',
                'value' => 'Paypal App Id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_logo',
                'value' => 'frontend/images/pay_7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_status',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_country',
                'value' => "US",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_currency',
                'value' => "USD",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_rate',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_api_key',
                'value' => 'pk_test_51Q9RrjEyouwRyXGhG5vz3N7Jf8HfWH2ExjN03ZJTDkZ6REBVdtgIK8aQKjwkZ2384TWBwyUn3ZyxkvePZsqfYgew008VacSwHF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'stripe_secret_key',
                'value' => 'sk_test_51Q9RrjEyouwRyXGhtKOLMtTKGqZWSkKFnHZOqbIs8mYpi6B9RG7GAz4gl6rS6sOZi748l7FiJ7UDymxUkFDjNNCa00HRrLJtwZ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_logo',
                'value' => 'frontend/images/pay_8.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_status',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_country',
                'value' => 'IN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_currency',
                'value' => 'INR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_rate',
                'value' => 86.55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_api_key',
                'value' => 'rzp_test_K7CipNQYyyMPiS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'razorpay_secret_key',
                'value' => 'zSBmNMorJrirOrnDrbOd1ALO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
