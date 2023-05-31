@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
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
            <div class="col-12 mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title d-inline">All Chapter <span class="badge badge-success-lighten">{{$chapters->count()}}</span></h4>
                            <a href="{{ url()->previous() }}" class="btn btn-danger float-end">Go Back</a>  &nbsp;&nbsp;
                            <a href="#"   class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Class</a> &nbsp;&nbsp;
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>Chapter Name</th>
                                            <th>Serial Number</th>
                                            <th>Videos</th>
                                            <th>Free Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chapters as $key => $chapter)
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-2">
                                                        {{--<input type="radio" name="chapter_id" id="chapter-{{optional($chapter)->id}}" onclick="setId({{ optional($chapter)->id }})">--}}
                                                        <label class="form-check-label" style="cursor: pointer;" for="chapter-{{$chapter->id}}">{{ optional($chapter)->name }}</label>
                                                    </div>
                                                </td>
                                                <td>{{ optional($chapter)->serial }}</td>
                                                <td>{{ $chapter->videos->count() }}</td>
                                                <td>
                                                    <input type="checkbox" class="border border-dark" disabled {{ optional($chapter)->is_free == true ? 'checked' : ''  }} name="is_free[]" id="switch0" data-switch="success"/>
                                                    <label class="border border-dark" for="switch0" data-on-label="Yes" data-off-label="No"></label>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.video-index',$chapter->id) }}"class="btn btn-success btn-sm"><i class="mdi mdi-video"></i></a>
                                                    <a href="{{ route('admin.chapters.edit',$chapter->id ?? '') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                                    <a href="{{ route('admin.chapters.delete',$chapter->id ?? '') }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </form>
            </div><!-- end col-->
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <form action="{{ route('admin.chapters.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="categoryAddModal">Add Classes</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="" id="addRowHere">
                        <div class="row mb-2">
                            <div class="col-lg-1">
                                <label for="">Class Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="name[]" class="form-control">
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <label for="">Class Serial (Integer)</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="number" name="serial[]" class="form-control">
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <input type="checkbox" name="is_free[]" id="switch" data-switch="success"/>
                                <label for="switch" data-on-label="Yes" data-off-label="No"></label>
                            </div> <!-- end col -->
                            <div class="col-lg-2">
                                <a id="addFiled" class="btn btn-sm btn-success shadow">+</a>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="addFiled"  class="btn btn-primary float-start" data-bs-dismiss="modal">Close</a>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </form><!-- /.modal-content -->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

@endsection
@section('script')
    <script>
        var switchLabelName = 0;
        $('#addFiled').click(()=>{
            switchLabelName = switchLabelName + 1;
            console.log(switchLabelName)
            var row = `
            <div class="row mb-2" id="inputRow">
               <div class="col-lg-1">
                                <label for="">Class Name</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="name[]" class="form-control">
                            </div>
            <div class="col-lg-1">
            <label for="">Class Serial</label>
            </div>
            <div class="col-lg-2">
            <input type="text" name="serial[]" class="form-control">
            </div>
               <div class="col-lg-1">
                   <input type="checkbox" name="is_free[]" id="switch`+ switchLabelName+`"  data-switch="success"/>
                   <label for="switch`+ switchLabelName+`" data-on-label="Yes" data-off-label="No"></label>
               </div>
               <div class="col-lg-2">
                   <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
               </div>
            </div> `
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


