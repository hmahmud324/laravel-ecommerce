<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;


class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.home',
        [
            'orders' => Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->take(3)->get(),
        ]);
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function order()
    {
        return view('customer.order');
    }

    public function changePassword()
    {
        return view('customer.change-password');
    }
    public function orderDetail()
    {
        return view('customer.order-detail');
    }



}
