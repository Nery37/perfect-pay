<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Transaction;
use App\Presenters\TransactionPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TransactionRepositoryEloquent.
 */
class TransactionRepositoryEloquent extends BaseRepository implements TransactionRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Transaction::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return TransactionPresenter::class;
    }
}
