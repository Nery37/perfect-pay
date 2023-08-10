<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    public function run(): void
    {
        $transactionStatuses = [
            ['name' => 'created'],
            ['name' => 'pendent'],
            ['name' => 'canceled'],
            ['name' => 'pay'],
            ['name' => 'confirmed'],
        ];

        foreach ($transactionStatuses as $transactionStatus) {
            TransactionStatus::query()->create($transactionStatus);
        }
    }
}
