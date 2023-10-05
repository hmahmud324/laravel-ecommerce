@extends('admin.master')
@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Basic Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <tr>
                                <th>Order Id</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Tax Amount</th>
                                <td>{{$order->tax_total}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Amount</th>
                                <td>{{$order->shipping_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th>Customer Info</th>
                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <td>{{$order->delivery_status}}</td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$order->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction No</th>
                                <td>{{$order->transaction_id}}</td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{$order->currency}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Product Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL No</th>
                                <th class="wd-15p border-bottom-0">Product Name</th>
                                <th class="wd-20p border-bottom-0">Product Price</th>
                                <th class="wd-15p border-bottom-0">Product Qty</th>
                                <th class="wd-25p border-bottom-0">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="w-50">{{$orderDetail->product_name}}</td>
                                    <td>{{$orderDetail->product_price}}</td>
                                    <td>{{$orderDetail->product_quantity}}</td>
                                    <td>{{$orderDetail->product_price * $orderDetail->product_quantity}}</td>
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
