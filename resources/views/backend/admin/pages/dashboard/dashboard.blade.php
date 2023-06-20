@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white border shadow text-center">
                <div class="card-body">
                    <h1>Athena Science Academy</h1>
                    <h5>You are at <span class="text-capitalize">{{ auth()->user()->type }}</span> Mode for creating Full Course</h5>
                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.components.module.dashboard.dashboard_course_table')
    @include('backend.admin.components.module.dashboard.admin_tools')
    @include('backend.admin.components.module.dashboard.front_dashboard')
    @include('backend.admin.components.module.dashboard.chart_one')

</div>
@endsection
