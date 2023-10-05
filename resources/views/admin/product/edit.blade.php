@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="category_id">
                                    <option disabled selected>-- Select Product Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @selected($category->id == $product->category_id)>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="sub_category_id">
                                    <option disabled selected>-- Select Product Sub Category --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" @selected($sub_category->id ==
                                            $product->sub_category_id)>{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="brand_id">
                                    <option disabled selected>-- Select Product Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @selected($brand->id ==
                                            $product->brand_id)>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="unit_id">
                                    <option disabled selected>-- Select Product Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" @selected($unit->id ==
                                            $product->unit_id)>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="productName" value="{{$product->name}}"
                                       placeholder="Product Name" name="name"
                                       type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="productCode" value="{{$product->code}}"
                                       placeholder="Product Code" name="code"
                                       type="text"/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Short Description"
                                          name="short_description">{{$product->short_description}}</textarea>
                                <span
                                    class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" placeholder="Long Description"
                                          name="long_description">{!! $product->long_description !!}</textarea>
                                <span
                                    class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$product->regular_price}}"
                                           placeholder="Product Regular Price" name="regular_price"/>
                                    <input type="number" class="form-control" value="{{$product->selling_price}}"
                                           placeholder="Product Selling Price" name="selling_price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Stock</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$product->stock_amount}}"
                                           placeholder="Product Stock Amount" name="stock_amount"/>
                                    <input type="number" class="form-control" value="{{$product->reorder_label}}"
                                           placeholder="Product Reorder Label" name="reorder_label"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="file" name="image"/>
                                <img src="{{asset($product->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="other_image[]" multiple/>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="" height="100" width="120"/>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Product Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


