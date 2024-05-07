<?php

namespace App\Providers;

use CustomerServiceInterface;
use DbCustomerService;
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
