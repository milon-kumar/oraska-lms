@extends('backend.admin.layouts.app')
@section('title','All Setting')
@section('content')
    <div class="container-fluid">
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
            <div class="col-sm-3 mb-2 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        @include('backend.admin.components.setting_tags')
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.setting.update') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-email" class="col-md-3 form-label">Set Video View Count</label>
                                <input type="hidden" name="types[]" value="video_view_count">
                                <input type="number" name="video_view_count" value="{{ get_setting('video_view_count') ?? ''}}" class="col-md-9 form-control" placeholder="Video View Count">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success float-end">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
