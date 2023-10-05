@extends('website.master')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">My Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Dashboard</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('customer.my-menu')
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h2>Change Password Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
