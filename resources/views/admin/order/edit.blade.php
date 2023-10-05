@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card card-body">
                <form action="{{route('admin.order-update',['id'=> $order->id])}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-3">Order Id</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" value="{{$order->id}}" readonly checked/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Order Total</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" value="{{$order->order_total}}" readonly checked/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Customer Info</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"
                                   value="{{$order->customer->name.'('.$order->customer->mobile.')'}}" readonly checked/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Order Status</label>
                        <div class="col-md-9">
                            <select class="form-control" name="order_status">
                                <option value="Pending" @selected($order->order_status == "Pending") > Pending</option>
                                <option value="Processing" @selected($order->order_status == "Processing")> Processing
                                </option>
                                <option value="Complete" @selected($order->order_status == "Complete")> Complete
                                </option>
                                <option value="Cancel" @selected($order->order_status == "Cancel")> Cancel</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Delivery Media</label>
                        <div class="col-md-9">
                            <select class="form-control" name="delivery_media">
                                <option value="Stead Fast">Stead Fast</option>
                                <option value="ReDX">ReDX</option>
                                <option value="Pathao">Pathao</option>
                                <option value="ePaper">ePaper</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Delivery Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="Update Order Status"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>

@endsection


