@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center text-success"> View All Class Videos ( You Can view a video for maximum <span class="text-danger fw-bolder">{{ get_setting('video_view_count') }}</span> times )</h3>
            </div>
            <div class="col-md-8 mx-auto">
                <div class="card border border-secondary mb-3">
                    <iframe id="myframe1" style="width: 100%;height: 100%;min-height: 520px; object-fit: contain;" src="{{$video->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>

                <div class="card border border-secondary">
                    <div class="container bootstrap snippets bootdey">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                @foreach($video->comments as $comment)
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
@section('script')

@endsection
