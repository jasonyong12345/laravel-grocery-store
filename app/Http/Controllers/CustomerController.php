<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;

class CustomerController extends Controller
{
    public function customerCreate(Request $request)
{
    $request->validate([
        'Customer_Name' => 'required|string|max:255',
        'Customer_Email' => 'required|string|email|max:255|unique:users',
        'Customer_Password' => 'required|string|min:8|confirmed',
    ]);

    $customer = Customer::create([
        'Customer_Name' => $request->Customer_Name,
        'Customer_Email' => $request->Customer_Email,
        'Customer_Password' => Hash::make($request->Customer_Password),
    ]);

    return view('/customerDashboard')->with('success', 'Customer registered successfully');
}
}
