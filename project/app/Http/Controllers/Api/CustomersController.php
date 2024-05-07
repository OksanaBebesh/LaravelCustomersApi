<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return response()->json($customers, 200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);
        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::find($id);

        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer): \Illuminate\Http\JsonResponse
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customer $customer): \Illuminate\Http\JsonResponse
    {
        if (Customer::find($customer)) {
            $customer->delete();

            return response()->json(true, 204);
        }

        return response()->json(false, 204);
    }

    public function edit(int $id): \Illuminate\Http\JsonResponse
    {
        return $this->show($id);
    }
}
