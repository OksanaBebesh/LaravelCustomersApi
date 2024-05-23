<?php

namespace App\Http\Requests;

use App\Models\Customer;
use App\Rules\EmailDomainRequestRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

final class StoreCustomerRequest extends FormRequest
{
    private array $validatedData;

    public function __construct() {
        parent::__construct();
        var_dump($this->all());
    }

    public function rules(): array
    {
        var_dump($this->all());
        return [
            'name' => 'required|string|max:50',
            'email' => ['required', 'email', new EmailDomainRequestRule()],
        ];
    }
    public function toDTO(array $data): Customer {
        return Customer::create($data);
    }

//    public function toArray(Customer $customer): array {
//        return (array)$customer;
//    }
}
