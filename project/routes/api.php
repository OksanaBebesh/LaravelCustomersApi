<?php
use App\Http\Controllers\Api\CustomersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/customers', CustomersController::class);
