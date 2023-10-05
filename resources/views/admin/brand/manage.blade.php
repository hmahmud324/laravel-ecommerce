@extends('admin.master')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Brand</li>
            </ol>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Brand Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Description</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Featured Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td><img src="{{asset($brand->image)}}" alt="" height="30" width="70"></td>
                                    <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>{{$brand->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('brand.delete', ['id' => $brand->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-sm me-1">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
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
