<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\TransactionStatus;
use App\Presenters\TransactionStatusPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TransactionStatusRepositoryEloquent.
 */
class TransactionStatusRepositoryEloquent extends BaseRepository implements TransactionStatusRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return TransactionStatus::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return TransactionStatusPresenter::class;
    }
}
