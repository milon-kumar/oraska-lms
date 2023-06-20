@extends('backend.admin.layouts.app')
@section('title','Edit Course Content')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border border-secondary">
                    <div class="card-body">
                        @include('backend.admin.components.main.pdf_tabs')
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <form action="{{ route('admin.setting.edit-course') }}" method="post" enctype="multipart/form-data" class="card border border-secondary">
                    @csrf
                    <div class="card-header">
                        <h4 class="header-title d-inline">Add/Edit Course Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped dt-responsive nowrap w-100">
                                    <tr>
                                        <th>

                                            <input type="hidden" name="types[]" value="community_post">
                                            <input type="checkbox"
                                                   name="community_post"
                                                   id="community_post"
                                                   value="1" {{ get_setting('community_post') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="community_post" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <p class="fw-bold">
                                                <label for="community_post" class="fw-bolder form-label c-pointer">Community Post</label>
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="add_edit_course_classes_videos">
                                            <input type="checkbox"
                                                   name="add_edit_course_classes_videos"
                                                   value="true" id="add_edit_course_classes_videos"
                                                   {{ get_setting('add_edit_course_classes_videos') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="add_edit_course_classes_videos" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="add_edit_course_classes_videos" class="fw-bolder form-label c-pointer">Add/Edit Course Classes Videos</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="add_edit_course_exam">
                                            <input type="checkbox"
                                                   name="add_edit_course_exam"
                                                   id="add_edit_course_exam"
                                                   {{ get_setting('add_edit_course_exam') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="add_edit_course_exam" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="add_edit_course_exam" class="fw-bolder form-label c-pointer">Add/Edit Course Exam</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_pdf_lecture_notes">
                                            <input type="checkbox"
                                                   name="upload_pdf_lecture_notes"
                                                   id="upload_pdf_lecture_notes"
                                                   {{ get_setting('upload_pdf_lecture_notes') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_pdf_lecture_notes" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_pdf_lecture_notes" class="fw-bolder form-label c-pointer">Upload pdf Lecture Notes</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_cq_questions">
                                            <input type="checkbox"
                                                   name="upload_cq_questions"
                                                   id="upload_cq_questions"
                                                   {{ get_setting('upload_cq_questions') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_cq_questions" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_cq_questions" class="fw-bolder form-label c-pointer">Upload CQ Questions (pdf)</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_cq_questions_solve">
                                            <input type="checkbox"
                                                   name="upload_cq_questions_solve"
                                                   id="upload_cq_questions_solve"
                                                   {{ get_setting('upload_cq_questions_solve') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_cq_questions_solve" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_cq_questions_solve" class="fw-bolder form-label c-pointer">Upload CQ Questions Solve (pdf)</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_pdf_questions">
                                            <input type="checkbox"
                                                   name="upload_pdf_questions"
                                                   id="upload_pdf_questions"
                                                   {{ get_setting('upload_pdf_questions') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_pdf_questions" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_pdf_questions" class="fw-bolder form-label c-pointer">Upload pdf Questions</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped dt-responsive nowrap w-100">
                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_pdf_solve">
                                            <input type="checkbox"
                                                   name="upload_pdf_solve"
                                                   id="upload_pdf_solve"
                                                   {{ get_setting('upload_pdf_solve') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_pdf_solve" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_pdf_solve" class="fw-bolder form-label c-pointer">Upload pdf Solve</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <input type="hidden" name="types[]" value="upload_omr_form_essentials">
                                            <input type="checkbox"
                                                   name="upload_omr_form_essentials"
                                                   id="upload_omr_form_essentials"
                                                   {{ get_setting('upload_omr_form_essentials') ? 'checked' : '' }}
                                                   data-switch="secondary"/>
                                            <label for="upload_omr_form_essentials" data-on-label="Yes" data-off-label="No"></label>
                                        </th>
                                        <td>
                                            <label for="upload_omr_form_essentials" class="fw-bolder form-label c-pointer">Upload OMR Form & Essentials</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="d-block float-end btn btn-dark">Update Setting</button>
                    </div> <!-- end card body-->
                </form> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
