@extends('backend.admin.layouts.app')
@section('title','Profile-',$user->name ?? '')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.setting.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h4 class="header-title mb-3">Profile Details</h4>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Your Name (আপনার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','value'=>$user->name ?? '','required'=>'required','placeholder'=>'Your Name'])
                                </div>
                                <div class="col-10 col-md-4">
                                    <p class="text-dark">Upload Profile Picture <code class="fw-bolder text-danger">(100KB max 360 by 360 pixels)</code> Upload<span class="text-danger fw-bold">*</span>:</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Profile Image'])
                                </div>
                                <div class="col-2 col-md-2" style="margin-top: 59px;">
                                    <div class="" style="width: 45px;height: 45px;overflow: hidden;border-radius: 50px;">
                                        <img class="img-fluid" src="{{ $user->image ? asset($user->image) : asset('images/user.webp')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Contact No (আপনার ফোন নাম্বার) <span class="text-danger fw-bold">*</span>:</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','value'=>$user->phone ?? '','name'=>'phone','required'=>'required','placeholder'=>'Your Contract Number'])
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Others Contact No (অন্য ফোন নাম্বার) <code class="fw-bolder text-success">(Optional)</code>  :</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'number','value'=>$user->others_phone ?? '','name'=>'others_phone','placeholder'=>'Others Contract Number'])
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Father’s Name (বাবার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'father_name','value'=>$user->father_name ?? '','required'=>'required','placeholder'=>'Father Name'])
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Mother’s Name (মা এর নাম)<span class="text-danger fw-bold">*</span>:</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'mother_name','value'=>$user->mother_name ?? '','placeholder'=>'Mother Name'])
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Date Of Birth <code class="fw-bolder text-success">(Optional)</code> :</p>
                                    @include('backend.admin.components.form_element.input',['type'=>'date','name'=>'dob','value'=>$user->dob ?? '','required'=>'required','placeholder'=>'Your DOB'])
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-dark">Gender  <code class="fw-bolder text-success">(Optional)</code> :</p>
                                    <select class="form-control" name="gender" id="">
                                        <option value="" class="d-none" selected>Select Your Gender</option>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="others" {{ $user->gender == 'others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-dark">About<code class="fw-bolder text-success">(Optional)</code> :</p>
                                    <textarea class="form-control" name="about" id="" rows="10">{!! $user->about ?? '' !!}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <li class="next list-inline-item float-end">
                                        <button href="#" class="btn btn-dark">Update Profile</button>
                                    </li>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
@endsection
