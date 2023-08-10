<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Customer;
use App\Presenters\CustomerPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CustomerRepositoryEloquent.
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Customer::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return CustomerPresenter::class;
    }
}
