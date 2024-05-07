<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index(CustomerServiceInterface $customerService) //
    {
        $customers = $customerService->getAll();
        return response()->json($customers, 200);
    }

    public function store(Request $request, CustomerServiceInterface $customerService): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);

        $customer = $customerService->storeData($request->all());

        return response()->json($customer, 201);
    }

    public function show(int $id, CustomerServiceInterface $customerService): \Illuminate\Http\JsonResponse
    {
        $customer = $customerService->show($id);

        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer, CustomerServiceInterface $customerService): \Illuminate\Http\JsonResponse
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customer $customer, CustomerServiceInterface $customerService): \Illuminate\Http\JsonResponse
    {
        if ($customerService->delete()) {
            return response()->json([], 204);
        }
        return response()->json(false, 204);

    }

    public function edit(int $id, CustomerServiceInterface $customerService): \Illuminate\Http\JsonResponse
    {
        return $customerService->show($id);
    }
}
