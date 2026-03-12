<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'identity_id' => 1,
                'document_number' => '1234567890101',
                'name' => 'Consumidor Final',
                'address' => 'Ciudad',
                'email' => 'cf@example.com',
                'phone' => '00000000',
            ],
            [
                'identity_id' => 1,
                'document_number' => '2548963214785',
                'name' => 'Juan Pérez',
                'address' => 'Zona 1, Guatemala',
                'email' => 'juanperez@example.com',
                'phone' => '12345678',
            ],
            [
                'identity_id' => 1,
                'document_number' => '4125879632145',
                'name' => 'María García',
                'address' => 'Zona 10, Guatemala',
                'email' => 'mariag@example.com',
                'phone' => '87654321',
            ],
            [
                'identity_id' => 2,
                'document_number' => 'PAS123456',
                'name' => 'John Doe',
                'address' => 'Antigua Guatemala',
                'email' => 'johndoe@example.com',
                'phone' => '55554444',
            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
