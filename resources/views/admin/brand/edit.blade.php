@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('category.update', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" value="{{$brand->name}}" placeholder="Brand Name" name="name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Brand Description" name="description">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="file" name="image"/>
                                <img src="{{asset($brand->image)}}" alt="" height="100" width="120">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Brand Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

