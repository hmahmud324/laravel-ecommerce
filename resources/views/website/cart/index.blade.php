@extends('website.master')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <p class="text-center">{{session('message')}}</p>
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @php($sum=0)
                @foreach($cart_products as $cart_product)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="{{route('product-details',['id'=>$cart_product->id])}}" target="_blank"><img
                                        src="{{asset($cart_product->options->image)}}" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="{{route('product-details',['id'=>$cart_product->id])}}">
                                        {{$cart_product->name}}</a></h5>
                                <p class="product-des">
                                    <span><em>Category: </em> {{$cart_product->options->category}}</span>
                                    <span><em>Brand: </em> {{$cart_product->options->brand}}</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <form action="{{route('cart.update',['id'=>$cart_product->rowId])}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="qty" value="{{$cart_product->qty}}" min="1"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$cart_product->id}}" min="1"/>
                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                     </div>
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{$cart_product->price}}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{$cart_product->price * $cart_product->qty}}</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" onclick=" return confirm('Are you sure to delete this...')" href="{{route('cart.delete',['id'=>$cart_product->rowId])}}"><i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    @php($sum = $sum + ($cart_product->price * $cart_product->qty))
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{number_format($sum)}} <span>&#2547; &nbsp;</span></span></li>
                                        @php($tax = $sum *0.15)
                                        <li>Tax Amount(15%)<span>{{number_format($tax)}} <span>&#2547; &nbsp;</span></span></li>
                                        <li>Shipping Charge<span>{{$shipping = 100 }} <span>&#2547; &nbsp;</span></span></li>
                                        <li class="last">Total Payable<span>{{number_format($shipping +$tax +$sum)}}<span>&#2547; &nbsp;</span></span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
