<div class="slick align-items-stretch" id="">
    @foreach($category->publishedCourses as $course)
        @include('frontend.component.single_course')
    @endforeach
</div>
