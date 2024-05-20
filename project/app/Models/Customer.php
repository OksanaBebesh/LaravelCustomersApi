<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','email'];
    public static function rules($id = null)
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:customers,email' . ($id ? ",$id" : ''),
        ];
    }
}
