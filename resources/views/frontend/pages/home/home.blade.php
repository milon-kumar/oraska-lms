@extends('frontend.layout.app')
@section('title','Home')
@section('frontcss')

@endsection
@section('content')
    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach(\App\Models\Category::all() as $key=> $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background: url({{ asset('frontend/img/slider5.jpg') }});height: 350px;
                    width: 100vw;
                    background-repeat: no-repeat;
                    background-size: cover;">
{{--                    <img src="{{ asset('frontend/img/slider5.jpg') }}" alt="" class="d-block img-fluid">--}}
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white">First slide label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    @if($available_course->count() > 0)
    <div class="available_course container my-4">
        <div class="card border border-dark mb-2">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h3>Popular Course</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($available_course as $key => $course)
                        <div class="col-md-4">
                            <div class="card shadow {{ $key % 2 == 0 ? 'bg-success' : 'bg-info' }} text-white">
                                <div class="card-body">
                                    <a href=""> <h5 class="bold text-center text-white">{{ Str::limit($course->title,25) ?? '' }}</h5></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>আমাদের কথা</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">
                                    <iframe style="object-fit: contain;width: 100%;" height="315" src="https://www.youtube.com/embed/Gzk8Qrn6rAw?controls=0&amp;start=420" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">
                                    <h4 class="text-dark">About Headding</h4>
                                    <div class="" style="overflow: scroll;height: 315px;text-align: justify;">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur autem cupiditate est excepturi fuga ipsum magni nesciunt ratione, reprehenderit vero. Autem consequuntur debitis et eveniet explicabo facilis incidunt laborum, quaerat vitae? Aliquam aliquid autem deleniti dicta esse ex excepturi illo in incidunt iste, iusto magnam maiores modi molestiae omnis praesentium quia ratione repellat, sed sit? Alias aliquam blanditiis dolorem doloribus, ducimus harum libero minus nisi optio, rerum sint vel, voluptate voluptatem. Enim hic quia voluptatem. Asperiores dignissimos fugiat in neque qui reiciendis rem. Accusantium animi atque aut blanditiis debitis deleniti dicta dolore dolorum et excepturi hic illum ipsa iusto labore maxime molestiae mollitia non nostrum odio officia pariatur quia quidem quisquam quos recusandae reiciendis sint, tempora tenetur vel voluptatem? Aliquam beatae consequatur delectus fugiat maxime totam veritatis? Architecto asperiores atque doloremque dolorum expedita fugit illo inventore iste, labore magni neque odio perspiciatis ratione sed vel veniam veritatis voluptatum! Dicta ipsa nihil, obcaecati omnis quibusdam vel vitae! Dolorem et explicabo molestiae non rerum sint tempore voluptatibus. A culpa excepturi numquam optio pariatur sed tenetur. Ab animi at corporis delectus deleniti deserunt dignissimos dolore dolorum earum eius harum in iusto laborum libero nemo non, nulla numquam quasi qui quibusdam ratione reiciendis repellendus sunt ullam veniam voluptate voluptatem voluptatum. Cumque ducimus ex, numquam praesentium quisquam saepe veniam veritatis vero! Accusamus autem delectus dolorem, eius, eos est et eveniet fuga itaque laudantium natus quaerat quidem rerum! Assumenda atque beatae doloremque, ea est ipsum laboriosam nostrum perspiciatis quo saepe! Debitis deserunt dolores est et facere id impedit iste itaque iusto laudantium libero molestiae, molestias mollitia natus perferendis quaerat quibusdam quidem quos ratione repudiandae rerum, suscipit ullam. Adipisci animi excepturi ipsa ipsam itaque ratione similique! Ab ad cupiditate dolorem eum ipsa, iure maxime praesentium ratione reiciendis vero. Atque beatae, doloremque eius eligendi eos, eveniet fuga fugiat fugit harum in ipsum iure laborum libero minus placeat quam, quisquam repellat reprehenderit suscipit tenetur ut veritatis voluptates voluptatum? Alias consectetur consequuntur culpa deserunt dignissimos doloremque dolorum ducimus earum enim esse exercitationem harum illo iusto laboriosam libero, nam odit perspiciatis provident ratione rerum sapiente sed tempore tenetur ullam unde velit vero. Aliquid blanditiis dolorem laborum magnam nam praesentium provident quis sed suscipit. Consequuntur ea enim fugiat ipsa modi ratione sit. Aspernatur corporis culpa cupiditate ducimus eligendi facilis ipsa ipsum odit perspiciatis possimus quasi, saepe tempore velit! Accusamus aliquam corporis debitis delectus dolorem doloremque doloribus et fuga necessitatibus nihil, non quos veritatis. Aliquam amet asperiores commodi cumque deserunt doloremque et minima nam nemo officia recusandae reiciendis, saepe sed tempore ullam ut vel, vero voluptates. Ad consequuntur debitis eligendi ipsam labore nemo quam soluta? Aliquid dolores eos, est obcaecati odit recusandae. A accusantium alias aperiam architecto atque dignissimos distinctio dolor, doloribus enim esse est facere, fuga labore laborum mollitia neque nisi pariatur perspiciatis quam quas quibusdam reiciendis rerum saepe sapiente sed sequi vitae! Ab corporis illo nihil, qui tempora ullam. Animi architecto aspernatur atque consectetur fugit impedit laboriosam, laborum laudantium nam, nemo officia perspiciatis quibusdam quisquam sequi unde vero voluptatem? Quod, ut.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($categories->count() > 0)
                        @forelse($categories as $category)
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    <h2 class="fw-bold">{{ optional($category)->name }} - ({{ $category->publishedCourses->count() > 1 ? $category->publishedCourses->count().' courses' : $category->publishedCourses->count().' course' }}) </h2>
                                </div>
                                <div class="card-body">
                                    @include('frontend.component.course_slider')
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow rounded-0">
                                <div class="card-header">
                                    <h3>Our Course Teacher's</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="teacherSlider">
                                        @foreach($teachers as $teacher)
                                            <div class="col-md-6">
                                                @include('frontend.component.instractor_card')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gradient p-4">
        <div class="container">
            <div class="card border border-secondary">
                <div class="" style="background: url({{ asset('frontend/img/sslcom.png') }});height: 213px;
                    background-size: 100% 150px contain;
                    background-repeat: no-repeat;
                    width:100%;
                    background-size: 95% 180px;">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('frontjs')
    <script>
        $('.slick').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $('#teacherSlider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
