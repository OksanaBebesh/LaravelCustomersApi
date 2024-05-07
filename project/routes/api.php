<?php
use App\Http\Controllers\Api\CustomersController;
use Illuminate\Support\Facades\Route;

Route::resource('/customers', CustomersController::class);
