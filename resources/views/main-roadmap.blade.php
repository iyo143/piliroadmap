@extends('layout.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
    <link rel="stylesheet" href="{{asset('css/RoadMapCard.css')}}">
    <link rel="stylesheet" href="{{asset('css/carousel.css')}}">
@endsection
@section('content')
    @include('layout.partials.sub-header-2')
    <section class="breadcrumbs section-bg" >
        <div class="container padding-20">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-header wow fadeInUp">
                    <h3>Road Map</h3>
                </div>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="innner-page">
        <div class="container-fluid">
            <div class="page-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <section id="facts-2"  class="wow fadeIn">
                                <div class="container">
                                    <div class="row counters">

                                        <div class="col-lg-3 col-6 text-center">
                                            <span data-toggle="counter-up">{{$trees}}</span>
                                            <p>Trees</p>
                                        </div>

                                        <div class="col-lg-3 col-6 text-center">
                                            <span data-toggle="counter-up">{{$farmers}}</span>
                                            <p>Farmers</p>
                                        </div>

                                        <div class="col-lg-3 col-6 text-center">
                                            <span data-toggle="counter-up">{{$processors}}</span>
                                            <p>Processors</p>
                                        </div>

                                        <div class="col-lg-3 col-6 text-center">
                                            <span data-toggle="counter-up">{{$retailers}}</span>
                                            <p>Repondents</p>
                                        </div>

                                    </div>

                                    <!-- <div class="facts-img">
                                      <img src="img/facts-img.png" alt="" class="img-fluid">
                                    </div> -->
                                    <div class="facts-img">
                                        <div id="map" class="map" style="height: 550px;"></div>
                                    </div>
                                </div>
                                <div class="popular_courses">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="owl-carousel active_course owl-loaded owl-drag">
                                                    <div class="owl-stage-outer">
                                                        <div class="owl-stage" style="transform: translate3d(-1520px, 0px, 0px); transition: all 1.5s ease 0s; width: 3420px;">
                                                            @foreach($location as $data)
                                                                <div class="owl-item cloned" style="width: 250px; margin-right: 25px;">
                                                                    <div class="single_course">
                                                                        <div class="course_head">
                                                                            <img class="img-fluid" src="storage/location_images/{{$data->pili_image}}" alt="" width="500" style="height: 200px"/>
                                                                        </div>
                                                                        <div class="course_content">
                                                                            <h4 class="mb-3 text-center">
                                                                                <a>{{$data->brgy}}</a>
                                                                                <p>{{$data->municipality}}</p>
                                                                            </h4>
                                                                            <div class="p-2 mt-2 bg-primary justify-content-between rounded text-white stats">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 px-4 text-center">
                                                                                        <p class="articles">Trees</p>
                                                                                        <p class="number1">23</p>
                                                                                    </div>
                                                                                    <div class="col-md-6 px-4 text-center">
                                                                                        <p class="articles">Retailers</p>
                                                                                        <p class="number1">3</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6 px-4 text-center">
                                                                                        <p class="articles">Farmers</p>
                                                                                        <p class="number1">1</p>
                                                                                    </div>
                                                                                    <div class=" col-md-6 px-4 text-center">
                                                                                        <p class="articles">Processors</p>
                                                                                        <p class="number1">54</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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

                            </section>
                        </div>
                        <div class="col-lg-4 py-3 d-flex justify-content-center ">
                            <div class="col-lg-8">
                                <div class="widget-wrap wow fadeInUp">
                                    <form action="#" class="search-form">
                                        <h3 class="widget-title">Search</h3>
                                        <div class="form-group">
                                            <span class="icon mai-search"></span>
                                            <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                                        </div>
                                    </form>
                                </div>
                                <div class="widget-wrap wow fadeInUp">
                                    <h3 class="widget-title">Recent Articles</h3>
                                    @foreach($articles as $data)
                                        <div class="blog-widget">
                                            <div class="blog-img">
                                                <img src="/storage/article_images/{{$data->cover_image}}" alt="">
                                            </div>
                                            <div class="entry-footer">
                                                <div class="blog-title mb-2"><a href="#">{{$data->title}}</a></div>
                                                <div class="meta">
                                                    <a href="#"><span class="icon-calendar"></span>{{$data->created_at->format('M d Y')}}</a>
                                                    <a href="#"><span class="icon-person"></span> Admin</a>
                                                    <a href="#"><span class="icon-chat"></span> 19</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="widget-wrap wow fadeInUp">
                                    <h3 class="widget-title wow fadeInUp">Authors</h3>
                                    <div class="tag-clouds">
                                        @foreach($articles as $data)
                                            <a href="#" class="tag-cloud-link">{{$data->author}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widget-wrap wow fadeInUp">
                                    <h3 class="widget-title wow fadeInUp">What is Pili</h3>
                                    <div class="tag-clouds">
                                        @foreach($articles as $data)
                                            <a href="#" class="tag-cloud-link">{{$data->author}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="widget-wrap wow fadeInUp">
                                    <h3 class="widget-title wow fadeInUp">Sorsogon</h3>
                                    <div class="tag-clouds">
                                        @foreach($articles as $data)
                                            <a href="#" class="tag-cloud-link">{{$data->author}}</a>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        var map = L.map('map').setView([12.978312,124.011375], 10);
        L.tileLayer( 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CxC7aDuJcG77pDH5yjGS', {
            maxZoom: 18,
            attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        }).addTo(map);
        @foreach($location as $data)
        var marker = L.marker([{{$data->latitude}}, {{$data->longitude}}]).addTo(map);
        marker.bindPopup("<img src='/storage/location_images/{{$data->pili_image}}' width='300'>"+
            "<hr>"+
            "<table class='table table-dark'>" +
            "<div class='section-header'>"+
            "<h3>{{$data->municipality}}</h3>"+
            "<h5 class='text-center'>{{$data->brgy}}</h5>"+
            " </div"+
            "<tr>" +
            "<th>Processors</th>"+
            "<td>{{$data->processors}}"+
            "</tr>"+
            "<tr>" +
            "<th>Trees</th>"+
            "<td>{{$data->trees}}"+
            "</tr>"+
            "<tr>" +
            "<th>Retailers</th>"+
            "<td>{{$data->retailers}}"+
            "</tr>"+
            "<tr>" +
            "<th>farmers</th>"+
            "<td>{{$data->farmers}}"+

            "</tr>"+

            "</table>"
        );
        @endforeach
    </script>
    <script>
        function active_course() {
            if ($(".active_course").length) {
                $(".active_course").owlCarousel({
                    loop: true,
                    margin: 20,
                    items: 3,
                    nav: true,
                    autoplay: 2500,
                    smartSpeed: 1500,
                    dots: false,
                    responsiveClass: true,
                    thumbs: true,
                    thumbsPrerendered: true,
                    navText: ["<img src='https://colorlib.com/preview/theme/edustage/img/prev.png'>", "<img src='https://colorlib.com/preview/theme/edustage/img/next.png'>"],
                    responsive: {
                        0: {
                            items: 1,
                            margin: 0
                        },
                        991: {
                            items: 2,
                            margin: 30
                        },
                        1200: {
                            items: 3,
                            margin: 30
                        }
                    }
                });
            }
        }
        active_course();
    </script>
@endsection

{{--scrap--}}

{{--<div class="popular_courses">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="owl-carousel active_course owl-loaded owl-drag">--}}
{{--                    <div class="owl-stage-outer">--}}
{{--                        <div class="owl-stage" style="transform: translate3d(-1520px, 0px, 0px); transition: all 1.5s ease 0s; width: 3420px;">--}}
{{--                            <div class="owl-item cloned" style="width: 350px; margin-right: 30px;">--}}
{{--                                @forelse($location as $data)--}}

{{--                                    <div class="card col-md-3 p-3 m-3">--}}
{{--                                        <div class="image"> <img src="/storage/location_images/{{$data->pili_image}}" class="rounded img-fluid" width="500" style="height: 200px"> </div>--}}
{{--                                        <div class="w-100 text-center">--}}
{{--                                            <h4 class="mb-0 mt-0">{{$data->brgy}}</h4>--}}
{{--                                            <span>{{$data->municipality}}</span>--}}
{{--                                            <div class="p-2 mt-2 bg-primary justify-content-between rounded text-white stats">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6 px-4 text-center">--}}
{{--                                                        <p class="articles">Trees</p>--}}
{{--                                                        <p class="number1">{{$data->trees}}</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6 px-4 text-center">--}}
{{--                                                        <p class="articles">Retailers</p>--}}
{{--                                                        <p class="number1">{{$data->retailers}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6 px-4 text-center">--}}
{{--                                                        <p class="articles">Farmers</p>--}}
{{--                                                        <p class="number1">{{$data->farmers}}</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class=" col-md-6 px-4 text-center">--}}
{{--                                                        <p class="articles">Processors</p>--}}
{{--                                                        <p class="number1">{{$data->processors}}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @empty--}}
{{--                                    <h5 class="text-center">--}}
{{--                                        There is no available Pili Location--}}
{{--                                    </h5>--}}
{{--                                @endforelse--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
