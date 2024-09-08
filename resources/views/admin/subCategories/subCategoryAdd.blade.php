@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">New Sub Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sub Category Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminSubCategoriesAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminSubCategorySave') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Main Categories</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <div class="mb-3 select2-sm">
                  <select name="main_category" class="single-select" required>
                    <option disabled selected>Select Category</option>

                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach

                  </select>
                </div>
                <div class="invalid-feedback">Please Select Category Name.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Sub Category Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="sub_category_name" class="form-control" required/>
                <div class="invalid-feedback">Please Enter Sub Category Name.</div>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Sub Category Image</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="file" name="sub_category_image" onchange="showImage()" id="image" class="form-control" />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Preview</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <img id="preview" class="border" src="{{ asset('backend/assets/images/no_image.jpg') }}" alt="Brand Picture" width="100">
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Add Category</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection