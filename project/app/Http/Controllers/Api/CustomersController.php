<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $customers = $this->customerService->getAll();
        return response()->json($customers, 200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);

        $customer = $this->customerService->store($request->all());

        return response()->json($customer, 201);
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = $this->customerService->show($id);

        return response()->json($customer);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $result = $this->customerService->update($request->all(), $id);

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
