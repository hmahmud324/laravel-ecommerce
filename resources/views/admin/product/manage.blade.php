@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Stock Amount</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Featured Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{asset($product->image)}}" alt="" height="30" width="70"></td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>{{$product->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('product.show', $product->id)}}"
                                           class="btn btn-green btn-sm me-1">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{route('product.edit',$product->id)}}"
                                           class="btn btn-info btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('product.update-status',$product->id)}}"
                                           class="btn {{$product->featured_status == 1 ? ' btn-primary' :' btn-warning'}}   btn-sm me-1">
                                            <i class="fa fa-arrow-circle-o-up"></i>
                                        </a>
                                        <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm me-1">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

