<?php

namespace App\Wrappers\Asaas;

use App\Entities\Transaction;
use App\Enums\PaymentMethodEnum;
use Ramsey\Uuid\Uuid;

class AsaasDataBuilder
{
    private $data = [];

    public function buildBasicInfo(Transaction $transaction): AsaasDataBuilder
    {
        $this->data = [
            'customer' => $transaction->customer->customer_gateway_id,
            'billingType' => $transaction->paymentMethod->id == PaymentMethodEnum::TICKET->value ? 'BOLETO' : $transaction->paymentMethod->name,
            'dueDate' => now()->format('Y-m-d'),
            'value' => $transaction->amount,
            'externalReference' => $transaction->id,
            'description' => "Pedido {$transaction->id}",
        ];

        return $this;
    }

    public function buildCreditCard(array $cardInfo): AsaasDataBuilder
    {
        $this->data['creditCard'] = [
            'holderName' => $cardInfo['holder_name'],
            'number' => $cardInfo['number'],
            'expiryMonth' => $cardInfo['expiry_month'],
            'expiryYear' => $cardInfo['expiry_year'],
            'ccv' => $cardInfo['ccv'],
        ];

        return $this;
    }

    public function buildCreditCardHolder(Transaction $transaction): AsaasDataBuilder
    {
        $this->data['creditCard'] =  [
            'name' => $transaction->customer->name,
            'email' => $transaction->customer->email,
            'cpfCnpj' => $transaction->customer->cpf_cnpj,
            'postalCode' => $transaction->customer->zip_code,
            'addressNumber' => $transaction->customer->address_number,
            'addressComplement' => $transaction->customer->addressComplement ?? null,
            'phone' => $transaction->customer->mobile_phone,
            'mobilePhone' => $transaction->customer->mobile_phone,
        ];

        return $this;
    }

    public function buildCreditCardToken(): AsaasDataBuilder
    {
        $this->data['creditCardToken'] = Uuid::uuid4();

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
