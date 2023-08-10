<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionStatusEnum;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * TransactionService.
 */
class TransactionService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param TransactionRepository $repository
     * @param PaymentService        $paymentService
     */
    public function __construct(
        TransactionRepository $repository,
        private readonly PaymentService $paymentService
    ) {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param bool  $skipPresenter
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function create(array $data, bool $skipPresenter = false): mixed
    {
        try {
            DB::beginTransaction();

            $data['transaction_status_id'] = TransactionStatusEnum::CREATED->value;
            $transaction = $this->repository->skipPresenter()->create($data);
            $payment = $this->paymentService->paymentCreate($transaction, $data);

            if (isset($payment['id'])) {
                $transaction->transaction_status_id = TransactionStatusEnum::getByName($payment['status']);
                $transaction->code_gateway_reference = $payment['id'];
                $transaction->invoice_url = $payment['invoiceUrl'] ?? '';
            } else {
                $transaction->transaction_status_id = TransactionStatusEnum::CANCELED->value;
            }

            $transaction->save();

            DB::commit();

            return $this->repository->skipPresenter(false)->find($transaction->id);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
