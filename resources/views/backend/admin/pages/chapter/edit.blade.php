@extends('backend.admin.layouts.app')
@section('title','Edit Course')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" value="{{ date('Y-m-d') }}">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9 mx-auto mt-3">
                <div class="card">
                    <div class="card-header">
                        Edit Class For  <strong>
                            <h4 class="header-title d-inline">{{ $chapter?->course->title  ?? '' }}</h4>
                        </strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.chapters.update',$chapter->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-2">
                                <label class="col-md-3" for="">Serial </label>
                                <div class="col-md-9">
                                    @include('backend.admin.components.form_element.input',['type'=>'number','required'=>'required','name'=>'serial','value'=>$chapter->serial ?? '',])
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-md-3" for="">Title</label>
                                <div class="col-md-9">
                                    @include('backend.admin.components.form_element.input',['type'=>'text','required'=>'required','name'=>'name','value'=>$chapter->name ?? '',])
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-md-3" for="">Video Show Status</label>
                                <div class="col-md-9">
                                    <input type="checkbox" name="is_free" id="is_free" {{ $chapter->is_free == 1 ? 'checked' : '' }} data-switch="secondary"/>
                                    <label for="is_free" data-on-label="Yes" data-off-label="No"></label>
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
