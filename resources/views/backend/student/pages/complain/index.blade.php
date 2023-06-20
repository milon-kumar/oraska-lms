@extends('backend.student.layouts.app')
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
                    <h4 class="page-title text-white">Complain Box</h4>
                    <a href="{{ route('student.complain.create') }}" class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle"></i>Create Issue</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach($complains as $complain)
                <div class="col-md-6 mb-3">
                    <div class="card border border-secondary">
                        <div class="card-body">
                            <a href="" class="float-end btn btn-danger" onclick="event.preventDefault();document.getElementById('deleteForm{{$complain->id ??''}}').submit();">
                                <form action="{{ route('student.complain.destroy',$complain->id ?? '') }}" class="d-none" id="deleteForm{{$complain->id ??''}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <i class="mdi mdi-trash-can" style="font-size: 15px;"></i>
                            </a>
                            <h4 class="text-decoration-underline">Complain - {{ $loop->iteration }} ({{ $complain->type ?? '' }})</h4>
                            <p>{!! $complain->message ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    {!! $complains->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
