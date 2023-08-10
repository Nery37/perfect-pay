<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Entities\Customer;
use League\Fractal\TransformerAbstract;

/**
 * Class CustomerTransformer.
 */
class CustomerTransformer extends TransformerAbstract
{
    /**
     * Transform the Customer entity.
     *
     * @param Customer $model
     *
     * @return array
     */
    public function transform(Customer $model): array
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'cpf_cnpj' => $model->cpf_cnpj,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
