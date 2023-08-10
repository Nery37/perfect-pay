<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TransactionCreateRequest;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionsController.
 */
class TransactionsController extends Controller
{
    /**
     * @var TransactionService
     */
    protected $service;

    /**
     * TransactionsController constructor.
     *
     * @param TransactionService $service
     */
    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    /**
     * @param TransactionCreateRequest $request
     *
     * @return JsonResponse
     */
    public function transactionProcess(TransactionCreateRequest $request): JsonResponse
    {
        try {
            return $this->successCreatedResponse($this->service->create($request->all()));
        } catch (\Exception $exception) {
            return $this->undefinedErrorResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
