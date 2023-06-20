@extends('backend.admin.layouts.app')
@section('title','Edit Opinion')
@section('content')
    <div class="row">
        <div class="col-md-12 card shadow border mt-3">
            <div class="card-body">
                <h2 class="d-inline-block">Edit Opinion</h2>
                <a href="{{ url()->previous() }}" class="btn btn-danger float-end">Go Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9 mx-auto mt-3">
            <div class="card border border-secondary shadow">
                <div class="card-header">
                    <h4>Edit Opinion Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.opinion.update',$opinion->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-2">
                            <label class="col-md-3" for="">Serial </label>
                            <div class="col-md-9">
                                @include('backend.admin.components.form_element.input',['type'=>'number','min'=>1,'name'=>'serial','value'=>$opinion->serial ?? '',])
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-md-3" for="">Image</label>
                            <div class="col-md-6">
                                @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','value'=>$opinion->image ?? '',])
                            </div>
                            <div class="col-md-3">
                                <img class="img-fluid" src="{{ asset($opinion->image) ?? defaultImage() }}" alt="">
                            </div>
                        </div>


                        <div class="row mb-2">
                            <label class="col-md-3" for="">Serial </label>
                            <div class="col-md-9">
                                @include('backend.admin.components.form_element.textarea',['name'=>'description','value'=>$opinion->description,'rows'=>2])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success float-end">Submit</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    </div>
@endsection
