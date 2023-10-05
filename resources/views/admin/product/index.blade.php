@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success" data-bs-timeout="3000">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="category_id" onchange="getSubCategoryByCategory(this.value)">
                                    <option disabled selected>-- Select Product Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="sub_category_id" id="subCategoryId">
                                    <option disabled selected>-- Select Product Sub Category --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
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
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="productName" placeholder="Product Name" name="name"
                                       type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="productCode" placeholder="Product Code" name="code"
                                       type="text"/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Short Description" name="short_description"></textarea>
                                <span class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" placeholder="Long Description" name="long_description"></textarea>
                                <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Product Regular Price" name="regular_price"/>
                                    <input type="number" class="form-control" placeholder="Product Selling Price" name="selling_price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Stock</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Product Stock Amount" name="stock_amount"/>
                                    <input type="number" class="form-control" placeholder="Product Reorder Label" name="reorder_label"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="file" name="image"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="other_image[]" multiple/>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

