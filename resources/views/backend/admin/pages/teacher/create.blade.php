@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.teacher.store') }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;"><i class="mdi mdi-content-save"></i> Save Teacher </button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="addRowHere">
                            <div class="col-md-6">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Teacher's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Name</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'names[]','placeholder'=>'Teacher Name ...'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Email Address</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'email','name'=>'emails[]','placeholder'=>'example@domain.com'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Phone Number</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'phones[]','placeholder'=>'017 ** *** ***'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Profile Image <code class="text-danger">Upload Teacher’s Image (300 KB, 900x300 pixels)</code> </label>
                                            @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'images[]','placeholder'=>'Profile Image'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Teacher About</label>
                                            @include('backend.admin.components.form_element.textarea',['name'=>'descriptions[]','rows'=>4])
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a id="addFiled" class="btn btn-sm btn-dark shadow float-end">+</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var switchLabelName = 0;
        $('#addFiled').click(()=>{
            switchLabelName = switchLabelName + 1;
            console.log(switchLabelName)
            var row = `
                <div class="col-md-6" id="inputRow">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Teacher's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Name</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'names[]','placeholder'=>'Teacher Name ...'])
                </div>
                <div class="mb-2">
                    <label for="">Email Address</label>
@include('backend.admin.components.form_element.input',['type'=>'email','name'=>'emails[]','placeholder'=>'example@domain.com'])
                </div>
                <div class="mb-2">
                    <label for="">Phone Number</label>
@include('backend.admin.components.form_element.input',['type'=>'text','name'=>'phones[]','placeholder'=>'017 ** *** ***'])
                </div>
                <div class="mb-2">
                    <label for="">Profile Image  <code class="text-danger">Upload Teacher’s Image (300 KB, 900x300 pixels)</code></label>
@include('backend.admin.components.form_element.input',['type'=>'file','name'=>'images[]','placeholder'=>'Profile Image'])
                </div>
                <div class="mb-2">
                    <label for="">Teacher About</label>
@include('backend.admin.components.form_element.textarea',['name'=>'descriptions[]','rows'=>4])
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
            </div>
        </div>
    </div>`
            ;
            $("#addRowHere").append(row);
        });

        $("#removeRow").click(()=>{
            $(this).closest().remove();
        });

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputRow').remove();
        });

        function setId(id) {
            console.log(id);
            $.post('{{ route('set-chapter-id') }}' , {chapter_id:id} , function (response) {
                console.log(response);
            });
        }
    </script>
@endsection
