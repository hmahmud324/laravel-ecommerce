@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.update',['id'=>$sub_category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option>--Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' : ' '}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control"  value="{{$sub_category->name}}" id="firstName" placeholder="Sub Category Name" name="name" type="text"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  id="lastName" placeholder="Sub Category Description" name="description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control"  id="email" type="file" name="image"/>
                                <img src="{{asset($sub_category->image)}}" alt="" height="100" width="120"/>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Edit Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
