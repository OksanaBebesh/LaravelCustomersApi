<?php

namespace App\Providers;

//use CustomerServiceInterface;
//use DbCustomerService;
use App\Interfaces\CustomerServiceInterface;
use App\Services\DbCustomerService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class CustomerCrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        App::bind(CustomerServiceInterface::class, DbCustomerService::class);
    }

}
