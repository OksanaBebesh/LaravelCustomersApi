<?php
namespace App\Services;

use App\Interfaces\CustomerServiceInterface;
use App\Models\Customer;

class DbCustomerService implements CustomerServiceInterface{

    public function getAll()
    {
        return Customer::all();
    }

    public function store(array $data)
    {
        return Customer::create($data);
    }

    public function show(string $id)
    {
        return Customer::find($id);
    }

    public function update(array $updatedCustomer, string $id): bool
    {
        $customer = Customer::find($id);

        return $customer->update($updatedCustomer);
    }

    public function delete(string $id): bool
    {
        $customer = Customer::find($id);

        if ($customer !== null) {
            $customer->delete();
            return true;
        }

        return false;
    }

    public function edit(string $id)
    {
        return $this->show($id);
    }
}
