@extends('backend.student.layouts.app')
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
                            <h5 class="card-title">{{ $post->title ?? '' }}</h5>
                        <p class="card-text">{!! $post->description !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="mt-1 mb-1">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-comments-alt"></i> {{ $post->comments->count() ??  0}} Comments</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-eye"></i>{{ $post->view_count ?? 0 }} View</a>
                        </div>
                    </div>
                </div>
                <div class="card border border-secondary">
                    <div class="container bootstrap snippets bootdey">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                @foreach($post->comments as $comment)
                                  <div class="border p-2 pb-2 mb-2">
                                      {{------------=========== Start Comment =========----------------}}
                                      <div class="d-flex">
                                          <div class="" style="width: 35px;height: 35px;overflow: hidden;">
                                              <img style="width: 100%;height: 100%;" src="{{ $comment->user->image ? asset($comment->user->image) : asset('images/user.webp') }}" alt="">
                                          </div>
                                          <div class="">
                                              <small class="d-block">{{ $comment->user->name ?? '' }}</small>
                                              <small class="d-block">Created at : {{ $comment->created_at->diffForHumans() ?? '' }}</small>
                                          </div>

                                      </div>
                                      <p class="pt-2">{!! $comment->message ?? '' !!}</p>
                                      {{------------=========== End Comment =========----------------}}
                                        {{------------=========== Start Replay =========----------------}}
                                          @foreach($comment->replayComments as $repay)
                                              <div class="border p-2 pb-2 mb-2">
                                                  <div class="d-flex">
                                                      <div class="" style="width: 35px;height: 35px;overflow: hidden;">
                                                          <img style="width: 100%;height: 100%;" src="{{ $repay->user->image ? asset($repay->user->image) : asset('images/user.webp') }}" alt="">
                                                      </div>
                                                      <div class="">
                                                          <small class="d-block">{{ $repay->user->name ?? '' }}</small>
                                                          <small class="d-block">Created at : {{ $repay->created_at->diffForHumans() ?? '' }}</small>
                                                      </div>
                                                  </div>
                                                  <p class="pt-2">{!! $repay->message ?? '' !!}</p>
                                              </div>
                                          @endforeach
                                      {{------------=========== End Replay =========----------------}}
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
