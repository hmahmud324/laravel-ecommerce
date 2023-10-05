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
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                               <li class="nav-item" role="presentation">
                                   <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Cash On Delivery</button>
                               </li>
                               <li class="nav-item" role="presentation">
                                   <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Online Payment</button>
                               </li>
                           </ul>
                           <div class="tab-content" id="myTabContent">
                               <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                   <form action="{{route('order.new')}}" method="POST">
                                       @csrf
                                       <div class="card card-body">
                                           <div class="mb-3">
                                               <label for="name" class="form-label">Full Name</label>
                                               @if(isset($customer->id))
                                               <input type="text" class="form-control" value="{{$customer->name}}"  placeholder="Full Name" readonly/>
                                               @else
                                                   <input type="text" class="form-control" name="name" id="name" placeholder="Full Name"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label for="email" class="form-label">Email Address</label>
                                               @if(isset($customer->id))
                                               <input type="text" class="form-control" value="{{$customer->email}}" placeholder="Email Address" readonly/>
                                               @else
                                               <input type="text" class="form-control" name="email" id="email" placeholder="Email Address"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>

                                           </div>
                                           <div class="mb-3">
                                               <label for="mobile" class="form-label">Mobile Number</label>
                                               @if(isset($customer->id))
                                                   <input type="text" class="form-control" value="{{$customer->mobile}}" placeholder="Mobile Number" readonly/>
                                               @else
                                                   <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label for="address" class="form-label">Delivery Address</label>
                                               <textarea class="form-control" name="delivery_address" id="address" rows="3"></textarea>
                                               <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label><input type="radio" name="payment_type" value="Cash" checked/>Cash On Delivery</label>
                                           </div>
                                           <div class="mb-3">
                                               <button type="submit" class="btn btn-primary w-100 rounded-0" >Confirm Order</button>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                               <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                   <form action="{{route('pay')}}" method="POST">
                                       @csrf
                                       <div class="card card-body">
                                           <div class="mb-3">
                                               <label for="name" class="form-label">Full Name</label>
                                               @if(isset($customer->id))
                                                   <input type="text" class="form-control" value="{{$customer->name}}"  placeholder="Full Name" readonly/>
                                               @else
                                                   <input type="text" class="form-control" name="name" id="name" placeholder="Full Name"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label for="email" class="form-label">Email Address</label>
                                               @if(isset($customer->id))
                                                   <input type="text" class="form-control" value="{{$customer->email}}" placeholder="Email Address" readonly/>
                                               @else
                                                   <input type="text" class="form-control" name="email" id="email" placeholder="Email Address"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label for="mobile" class="form-label">Mobile Number</label>
                                               @if(isset($customer->id))
                                                   <input type="text" class="form-control" value="{{$customer->mobile}}" placeholder="Mobile Number" readonly/>
                                               @else
                                                   <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number"/>
                                               @endif
                                               <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label for="address" class="form-label">Delivery Address</label>
                                               <textarea class="form-control" name="delivery_address" id="address" rows="3"></textarea>
                                               <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                           </div>
                                           <div class="mb-3">
                                               <label><input type="radio" name="payment_type" value="Online" checked/>Online Payment</label>
                                           </div>
                                           <div class="mb-3">
                                               <input type="submit" class="btn btn-primary w-100 rounded-0" value="Confirm Order"/>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title text-center">Cart Summary</h5>
                            <div class="sub-total-price">
                                @php($sum = 0)
                                @foreach($cart_products as $cart_product)
                                <div class="total-price">
                                    <p class="value">{{$cart_product->name}} : {{$cart_product->price}} * {{$cart_product->qty}}</p>
                                    <p class="price">{{$cart_product->price * $cart_product->qty}}</p>
                                </div>
                                    @php($sum = $sum +($cart_product->price * $cart_product->qty))
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{number_format($sum)}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount(15%) :</p>
                                    @php($tax = $sum * 0.15)
                                    <p class="price">{{number_format($tax)}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Charge :</p>
                                    <p class="price">{{$shipping = 100 }}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Total Payable :</p>
                                    <p class="price">{{number_format($shipping + $tax + $sum)}}</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        Session::put('order_total',($shipping + $tax + $sum));
                        Session::put('tax_total',$tax);
                        Session::put('shipping_total',$shipping);
                        ?>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
