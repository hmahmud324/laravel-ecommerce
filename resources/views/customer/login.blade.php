@extends('website.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>Login Form</h3>
                            <p class="text-success">{{session('message')}}</p>
                        </div>
                        <form class="row" action="{{route('customer.login')}}" method="post">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">Phone Number</label>
                                    <input class="form-control" type="number" name="mobile" id="mobile" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password" id="reg-pass" required>
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            <p class="outer-link">Dont have an account yet?! <a href="{{route('customer.registration')}}">Register Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

