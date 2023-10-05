<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;

    public function registration()
    {
        return view('website.customer.registration-form');
    }
    public function newRegistration(Request $request)
    {
        $this->validate($request,[
            'name'                  => 'required',
            'email'                 => 'required|unique:customers,email',
            'mobile'                => 'required|unique:customers,mobile',
            'password'              => 'required',
        ]);

        $this->customer = Customer::newCustomer($request);

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/my-dashboard');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }



    public function login()
    {
        return view('customer.login');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('mobile', $request->mobile)->first();

        if ($this->customer)
        {
            if (password_verify($request->password,$this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/my-dashboard');
            }
            else
            {
                return back()->with('message', 'Invalid Password');
            }
        }
        else
        {
            return back()->with('message', 'Invalid Mobile Number');
        }
    }
}
