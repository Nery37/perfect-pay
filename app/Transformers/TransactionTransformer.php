<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Entities\Transaction;
use App\Enums\TransactionStatusEnum;
use League\Fractal\TransformerAbstract;

/**
 * Class TransactionTransformer.
 */
class TransactionTransformer extends TransformerAbstract
{
    /**
     * Transform the Transaction entity.
     *
     * @param Transaction $model
     *
     * @return array
     */
    public function transform(Transaction $model): array
    {
        return [
            'id' => (int) $model->id,
            'amount' => $model->value,
            'transaction_status_id' => $model->transaction_status_id,
            'invoice_url' => $model->invoice_url,
            'status' => TransactionStatusEnum::getById($model->transaction_status_id)->getTranslateName(),
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
