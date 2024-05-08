<?php
namespace App\Interfaces;

use App\Models\Customer;

interface CustomerServiceInterface
{
    public function getAll();

    public function store(array $data);

    public function show(string $id);

    public function update(array $customer, string $id);

    public function delete(string $id);

    public function edit(string $id);
}
