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
                    <div class="card card-body" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="background-color: #0167F3; color: white;">Sl NO</th>
                                <th style="background-color: #0167F3; color: white;">Order Id</th>
                                <th style="background-color: #0167F3; color: white;">Order Total</th>
                                <th style="background-color: #0167F3; color: white;">Order Date</th>
                                <th style="background-color: #0167F3; color: white;">Order Status</th>
                                <th style="background-color: #0167F3; color: white;">Payment Status</th>
                                <th style="background-color: #0167F3; color: white;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
