<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
//    public function index()
//    {
//        $customers = Customers::all();
//        return view('customers.index', compact('customers'));
//    }
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'body' => 'required',
//        ]);
//        Customers::create($request->all());
//        return redirect()->route('customers.index')
//            ->with('success', 'Customer created successfully.');
//    }
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'body' => 'required',
//        ]);
//        $customer = Customers::find($id);
//        $customer->update($request->all());
//        return redirect()->route('customers.index')
//            ->with('success', 'Customer updated successfully.');
//    }
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $customer = Customers::find($id);
//        $customer->delete();
//        return redirect()->route('customers.index')
//            ->with('success', 'Customer deleted successfully');
//    }
//    // routes functions
//    /**
//     * Show the form for creating a new customer.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('customers.create');
//    }
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $customer = Customers::find($id);
//        return view('customers.show', compact('customer'));
//    }
//    /**
//     * Show the form for editing the specified Customer.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        $customer = Customers::find($id);
//        return view('customers.edit', compact('customer'));
//    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Customers::all());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $customer = Customers::create($request->all());

        return response()->json($customer, 201);
    }
//TODO edit the same
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = Customers::find($id);

        return response()->json($customer);
    }

    public function update(Request $request, Customers $customer): \Illuminate\Http\JsonResponse
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customers $customer): \Illuminate\Http\JsonResponse
    {
        $customer->delete();

        return response()->json(null, 204);
    }

    public function edit(int $id): \Illuminate\Http\JsonResponse
    {
        $customer = Customers::find($id);

        return response()->json($customer);
    }
}
