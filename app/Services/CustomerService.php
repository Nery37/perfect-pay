<?php

declare(strict_types=1);

namespace App\Services;

use App\AppHelper;
use App\Repositories\CustomerRepository;
use App\Wrappers\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * CustomerService.
 */
class CustomerService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param CustomerRepository      $repository
     * @param PaymentGatewayInterface $paymentGateway
     */
    public function __construct(
        CustomerRepository $repository,
        private readonly PaymentGatewayInterface $paymentGateway
    ) {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param bool  $skipPresenter
     *
     * @return array|mixed
     *
     * @throws \Exception
     */
    public function create(array $data, bool $skipPresenter = false): mixed
    {
        try {
            DB::beginTransaction();

            $data['cpf_cnpj'] = AppHelper::removeSpecialCharacters($data['cpf_cnpj']);
            $data['mobile_phone'] = AppHelper::removeSpecialCharacters($data['mobile_phone']);
            $data['zip_code'] = AppHelper::removeSpecialCharacters($data['zip_code']);

            $customer = $this->repository->skipPresenter()->create($data);

            $response = $this->paymentGateway->customerCreate($customer);

            if (isset($response['id'])) {
                $customer->customer_gateway_id = $response['id'];
                $customer->save();
            }
            DB::commit();

            return $this->repository->skipPresenter(false)->find($customer->id);
        } catch (\Exception $exception) {
            DB::rollBack();

            throw $exception;
        }
    }
}
