@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card border">
                    <div class="card-body">
                        <h3 class="text-center text-success"> View All Class Videos ( You Can view a video for maximum <span class="text-danger fw-bolder">{{ get_setting('video_view_count') }}</span> times )</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="accordion custom-accordion" id="custom-accordion-one">
                                @foreach($chapters as $key => $chapter)
                                    <div class="card mb-0 border mb-2">
                                            <div class="card-header" id="heading-{{$key}}">
                                                <h5 class="m-0">
                                                    <a class="custom-accordion-title d-block py-1"
                                                       data-bs-toggle="collapse" href="#collapse-{{$key}}"
                                                       aria-expanded="true" aria-controls="collapse-{{$key}}"
                                                       disabled
                                                    >
                                                        {{$loop->iteration}} . {{ $chapter->name }} ({{ $chapter->videos->count() ?? 0 }} {{ $chapter->videos->count() > 1 ? 'videos' : 'Video' }} )<i
                                                            class="mdi mdi-chevron-down accordion-arrow"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse-{{$key}}" class="collapse"
                                                 aria-labelledby="heading-{{$key}}"
                                                 data-bs-parent="#custom-accordion-one">
                                                <div class="card-body">
                                                    <ul class="navbar-nav">
                                                        @foreach($chapter->videos as $video)
                                                            <li class="nav-item border mb-2 p-2">
                                                                <a class="nav-link d-inline-block" href="">
                                                                    <i class="mdi mdi-play-circle"></i> {{ $loop->iteration }} . {{ $video->video_title ?? '' }}</a>
                                                                <a href="{{ $video->view_count > get_setting('video_view_count') ? 'Javascript:void(0)' : route('student.show-video',$video->id)  }}" class="btn btn-success btn-sm float-end">Preview ({{ $video->view_count }})</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
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
