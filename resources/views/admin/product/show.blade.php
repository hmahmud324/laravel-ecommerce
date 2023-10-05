@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Product</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Detail Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <tr>
                                <th>Product Id</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub Category</th>
                                <td>{{$product->subCategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Short Description</th>
                                <td>{{$product->short_description}}</td>
                            </tr>
                            <tr>
                                <th>Product Long Description</th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price</th>
                                <td>{{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Selling Price</th>
                                <td>{{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Reorder Label</th>
                                <td>{{$product->reorder_label}}</td>
                            </tr>
                            <tr>
                                <th>Product Main Image</th>
                                <td><img src="{{asset($product->image)}}" alt="" height="100" width="120"/></td>
                            </tr>
                            <tr>
                                <th>Product Other Images</th>
                                <td>
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="100" width="120"/>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Product Sales Total</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Product View Total</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Product Featured Status</th>
                                <td>{{$product->featured_status}}</td>
                            </tr>
                            <tr>
                                <th>Product Published Status</th>
                                <td>{{$product->status}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


