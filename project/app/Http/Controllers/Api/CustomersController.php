<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StorePostRequest;
use App\Interfaces\CustomerServiceInterface;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    private CustomerServiceInterface $customerService;

    function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(): \Illuminate\Http\JsonResponse //
    {
        $fileDebugger = fopen('./test_debugg_filename.txt','a+');
        $debug_result = PHP_EOL . "GOOD";
        fputs($fileDebugger, $debug_result);
        fclose($fileDebugger);

        $customers = $this->customerService->getAll();
        return response()->json($customers, 200);
    }

    public function store(StoreCustomerRequest $request): \Illuminate\Http\JsonResponse
    {

//        $validated = $request->validate(Customer::rules());
//        $fileDebugger = fopen('./test_debugg_filename.txt','a+');
//        $debug_result = PHP_EOL . $validated;
//        fputs($fileDebugger, var_export($validated , true));
//        fclose($fileDebugger);

        $customer = $this->customerService->store($request->all());
        return response()->json($customer, 201);
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = $this->customerService->show($id);

        return response()->json($customer);
    }

    public function update(StoreCustomerRequest $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate(StoreCustomerRequest::rules());
        $result = $this->customerService->update($validated, $id);

        return response()->json($result);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        if ($this->customerService->delete($id)) {
            return response()->json([], 204);
        }

        return response()->json(false, 204);
    }

    public function edit(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = $this->customerService->show($id);

        return response()->json($customer);
    }
}
