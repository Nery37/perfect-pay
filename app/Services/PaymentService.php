<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Transaction;
use App\Wrappers\Interfaces\PaymentGatewayInterface;

/**
 * TransactionService.
 */
class PaymentService
{
    /**
     * @param PaymentGatewayInterface $paymentGateway
     */
    public function __construct(
        private readonly PaymentGatewayInterface $paymentGateway
    ) {
    }

    public function paymentCreate(Transaction $transaction, array $data)
    {
        return $this->paymentGateway->paymentCreate($transaction, $data);
    }
}
