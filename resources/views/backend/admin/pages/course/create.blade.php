@extends('backend.admin.layouts.app')
@section('title','Create A New Course')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1>Athena Science Academy</h1>
                        <h4 class="header-title">Create new course</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Insert Course Name</label>
                                <input type="text" class="form-control" name="title" placeholder="Course Title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Course Category</label>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="input-group">
                                            <select name="categories_id" class="form-control select2-search--inline" data-toggle="select2" id="">
                                                <option>Select</option>
                                                @forelse(\App\Models\Category::where('status',1)->get() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @empty
                                                    <option>No Category Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="mdi mdi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course Image</label>
                                <input type="file" class="form-control dropify" name="image" placeholder="Course Image">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Regular Course Fee</label>
                                <input type="number" class="form-control" name="regular_course_fee" placeholder="Regular Course Fee">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Discount</label>
                                <input type="number" class="form-control" name="discount_fee" placeholder="Discount">
                            </div>
                            <a href="{{route('admin.dashboard')}}" class="btn btn-danger">Go Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.category.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="categoryAddModal">Add Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="" class="col-3 col-form-label">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Category Name">
                            @error('name')
                            <small class="text-danger"></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </form><!-- /.modal-content -->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->
@endsection
