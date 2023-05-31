@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center text-success"> View All Class Videos ( You Can view a video for maximum <span class="text-danger fw-bolder">{{ get_setting('video_view_count') }}</span> times )</h3>
            </div>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <iframe id="myframe1" style="width: 100%;height: 100%;min-height: 520px; object-fit: contain;" src="{{$video->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
        <script>
//          alert("ok");
//          const div = document.getElementById('iframeId').contents().find('div');
            const ifremDoc = document.getElementById('myframe1').ownerDocument;
            console.log(ifremDoc);
            ifremDoc.querySelector('.navbar-custom').style.color="red";
//          ifremDoc.querySelector(".");
        </script>
@endsection
