@extends('backend.admin.layouts.app')
@section('style')
    <style>
        .profile-image{
            width: 45px;
            height: 45px;
            overflow: hidden;
            border: 4px solid #727cf5 !important;
        }
        .profile-info{
            padding: 0 20px;
        }
        .profile-info h5{
            margin: 0px;
            padding: 8px 0px 0 0;
        }
    </style>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row bg-secondary">
            <div class="col-12" style="position: sticky;width: 100%;">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title text-white">{{ $post->title ?? '' }}</h4>
                    <a href="{{ route('student.post.index') }}" class="btn btn-primary mb-2">
                        <i class="mdi  dripicons-feed"> </i> News Feed</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-7 mx-auto">
                <div class="card border border-secondary mb-2">
                    <div class="card-header">
                        <div class="">
                            <div class="rounded-circle profile-image" style="float: left;">
                                <img class="w-100 h-100 contain" src="{{ $post->user->image ? asset($post->user->image) : asset('images/user.webp')}}" alt="{{ $post->user->name ?? ''}}">
                            </div>
                            <div class="profile-info" style="float: left;">
                                <h5>{{ $post->user->name ?? '' }}</h5>
                                <p>Created At : {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="float-end" style="float: left;">
                                @if($post->user_id  == $post->user->id )
                                    <a href="{{ route('student.post.edit',$post->id) }}">
                                        <i class="mdi mdi-comment-edit-outline"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <img src="{{ $post->image ? asset($post->image) : asset('images/default.jpg') }}" class="card-img-top" alt="{{ $post->slug }}">
                    <div class="card-body">
                        <a href="{{ route('student.post.show',$post->id) }}">
                            <h5 class="card-title">{{ $post->title ?? '' }}</h5>
                        </a>
                        <p class="card-text">{!! $post->description !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="mt-1 mb-1">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted ps-0"><i class="mdi mdi-heart text-danger"></i> 1.2k Likes</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-comments-alt"></i> 148 Comments</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-share-alt"></i> Share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
