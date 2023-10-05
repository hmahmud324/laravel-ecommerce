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
                <div class="col">
                    <div class="card card-body">
                            <h4 class="text-center text-success">{{session('message')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

