<?php

use App\Models\Customer;

class DbCustomerService implements CustomerServiceInterface{

    public function getAllData()
    {
        return Customer::all();
    }

    public function store(array $data){
        return Customer::create($data);
    }

    public function show(string $id, array $data) {
        return Customer::find($id);
    }

    public function update(array $data, Customer $customer){
        return $customer->update($data);
    }

    public function delete(Customer $customer){
        return $customer->delete();
    }

    public function edit(string $id) {
        return $this->show($id);
    }
}
