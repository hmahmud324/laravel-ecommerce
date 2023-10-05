@extends('website.master')
@section('body')

    <div class="breadcrumbs" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <div class="card card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="card card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Your Password</label>
                                        <input type="password" class="form-control" name="password" id="password" />
                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100 rounded-0">Confirm Order</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
