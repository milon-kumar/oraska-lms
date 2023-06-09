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
                <div class="card">
                        <div class="card-header">
                            <h4 class="header-title d-inline">All Videos <span class="badge badge-success-lighten">{{$videos->count()}}</span></h4>
                            <a href="{{ route('admin.course-by-chapter',$course_id) }}"   class="btn btn-danger float-end">All Chapter</a> &nbsp;&nbsp;
                            <a href="{{ url()->previous() }}"   class="btn btn-danger float-end">Go Back</a> &nbsp;&nbsp;
                            <a href="#"   class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Video</a> &nbsp;&nbsp;
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>Video Title</th>
                                            <th>Serial Number</th>
                                            <th>Video Link</th>
                                            <th>Duration</th>
                                            <th>Free Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($videos as $key => $video)
                                            <tr>
                                                <td>{{ optional($video)->video_title }}</td>
                                                <td>{{ optional($video)->serial }}</td>
                                                <td>
                                                    <a href="{{ optional($video)->video_link }}">{{ Str::limit(optional($video)->video_link,30) }}</a>
                                                </td>
                                                <td>{{ $video->duration ?? '' }}</td>
                                                <td>
                                                    <input type="checkbox" class="border border-dark" disabled {{ optional($video)->is_free == 1 ? 'checked' : ''  }} name="is_free[]" id="switch0" data-switch="success"/>
                                                    <label class="border border-dark" for="switch0" data-on-label="Yes" data-off-label="No"></label>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.video.edit',$video->id ?? '') }}" class="btn btn-primary btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                                    <a href="" onclick="event.preventDefault();document.getElementById('deleteForm-{{optional($video)->id}}').submit();" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                                    <form action="{{ route('admin.video.destroy',$video->id ?? '') }}" id="deleteForm-{{optional($video)->id}}" method="post" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <form action="{{ route('admin.video.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="categoryAddModal">Add Video</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="" id="addRowHere">
                        <div class="row mb-2">
                            <div class="col-lg-1">
                                <input type="number" name="serial[]" class="form-control" placeholder="Serial *">
                                <input type="hidden" value="{{ $chapter_id }}" name="chapter_id" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" name="title[]" required class="form-control" placeholder="Video title *">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" required name="link[]" class="form-control" placeholder="Video Link *">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="duration[]" placeholder="Video Duration">
                                <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                            </div>
                            <div class="col-lg-1">
                                <input type="checkbox" name="is_free[]" id="switch" data-switch="success"/>
                                <label for="switch" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                            <div class="col-lg-1">
                                <a id="addFiled" class="btn btn-sm btn-success shadow">+</a>
                            </div>
                        </div>
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
                    <input type="number" name="serial[]" class="form-control" placeholder="Serial *">
                    <input type="hidden" value="{{ $chapter_id }}" name="chapter_id" class="form-control">
                </div>
                <div class="col-lg-3">
                    <input type="text" name="title[]" required class="form-control" placeholder="Video title *">
                </div>
                <div class="col-lg-3">
                    <input type="text" required name="link[]" class="form-control" placeholder="Video Link *">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="duration[]" placeholder="Video Duration">
                    <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                </div>
            <div class="col-lg-1">
                <input type="checkbox" name="is_free[]" id="switch`+ switchLabelName+`" data-switch="success"/>
            <label for="switch`+ switchLabelName+`" data-on-label="Yes" data-off-label="No"></label>
            </div>
               <div class="col-lg-1">
                   <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
               </div>
            </div> `;

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
