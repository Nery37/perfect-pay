<?php

declare(strict_types=1);

namespace App\Wrappers\Asaas;

use App\Clients\Interfaces\ClientHttpInterface;
use App\Entities\Customer;
use App\Entities\Transaction;
use App\Enums\PaymentMethodEnum;
use App\Wrappers\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\Facades\Log;

/**
 * AsaasGateway.
 */
class AsaasGateway implements PaymentGatewayInterface
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct(
        private readonly ClientHttpInterface $client
    ) {
        $this->baseUrl = env('ASAAS_URL', '');
        $this->apiKey = env('ASAAS_API_KEY', '');
    }

    /**
     * @param Customer $customer
     *
     * @return array
     *
     * @throws \Exception
     */
    public function customerCreate(Customer $customer): array
    {
        try {
            $data = [
                'name' => $customer->name,
                'cpfCnpj' => $customer->cpf_cnpj,
                'externalReference' => $customer->id,
                'email' => $customer->email,
                'phone' => $customer->mobile_phone,
            ];

            $response = $this->client->sendPost($this->baseUrl . '/api/v3/customers', $data, $this->getHeaders());

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Throwable $exception) {
            Log::error('AsaasGateway->customerCreate: ' . $exception->getMessage());
            throw new \Exception('Erro ao criar customer', 400);
        }
    }

    /**
     * @throws \Exception
     */
    public function paymentCreate(Transaction $transaction, array $data): array
    {
        $builder = new AsaasDataBuilder();
        $builder->buildBasicInfo($transaction);

        // Arrow function para construir informações relacionadas a cartão de crédito
        $buildInformationCreditCard = fn () => $builder
            ->buildCreditCard($data)
            ->buildCreditCardHolder($transaction)
            ->buildCreditCardToken();

        if($transaction->paymentMethod->id == PaymentMethodEnum::CREDIT_CARD->value){
            $buildInformationCreditCard();
        }

        return $this->sendPayment($builder->getData());
    }

    /**
     * @param $data
     *
     * @return array
     *
     * @throws \Exception
     */
    private function sendPayment(array $data): array
    {
        try {
            $response = $this->client->sendPost($this->baseUrl . '/api/v3/payments', $data, $this->getHeaders());
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Throwable $exception) {
            Log::error('AsaasGateway->customerCreate: ' . $exception->getMessage());
            throw new \Exception('Erro ao criar pagamento', 400);
        }
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'access_token' => $this->apiKey
        ];
    }
}
