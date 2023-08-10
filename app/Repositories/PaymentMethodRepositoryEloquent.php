<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\PaymentMethod;
use App\Presenters\PaymentMethodPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PaymentMethodRepositoryEloquent.
 */
class PaymentMethodRepositoryEloquent extends BaseRepository implements PaymentMethodRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return PaymentMethod::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return PaymentMethodPresenter::class;
    }
}
