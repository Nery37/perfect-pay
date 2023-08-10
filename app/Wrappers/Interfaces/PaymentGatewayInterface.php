<?php

declare(strict_types=1);

namespace App\Wrappers\Interfaces;

use App\Entities\Customer;
use App\Entities\Transaction;

interface PaymentGatewayInterface
{
    public function customerCreate(Customer $customer): array;

    public function paymentCreate(Transaction $transaction, array $data): array;
}
