<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $transactionStatuses = [
            ['name' => 'TICKET'],
            ['name' => 'PIX'],
            ['name' => 'CREDIT_CARD'],
        ];

        foreach ($transactionStatuses as $transactionStatus) {
            PaymentMethod::query()->create($transactionStatus);
        }
    }
}
