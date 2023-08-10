<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;

/**
 * Class CustomersController.
 */
class CustomersController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $service;

    /**
     * CustomersController constructor.
     *
     * @param CustomerService $service
     */
    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CustomerCreateRequest $request
     *
     * @return JsonResponse
     */
    public function customerProcess(CustomerCreateRequest $request): JsonResponse
    {
        try {
            return $this->successCreatedResponse($this->service->create($request->all()));
        } catch (\Exception $exception) {
            return $this->undefinedErrorResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
