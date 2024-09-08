@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Home Slider</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Slides</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminSlideAdd') }}" class="btn btn-primary">Add Slide</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ empty($item->image) ? asset('backend/assets/images/no_image.jpg') :
                                    asset('images/homeSlider/' . $item->image) }}" alt="Brand Picture" width="80" class="border">
                                 </td>
                                <td>
                                    <a href="{{ route('adminSlideEdit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('adminSlideDelete', $item->id ) }}" class="btn btn-danger btn-sm ms-3" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection