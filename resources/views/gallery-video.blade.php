@extends('layout.layout')
@section('links')

    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@endsection
@section('content')
    @include('layout.partials.sub-header-2')
    <section class="breadcrumbs section-bg" >
        <div class="container padding-20">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-header wow fadeInUp">
                    <h3>Gallery</h3>
                </div>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="inner-page section-bg">
        <div class="container-fluid">
            <div class="page-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <section id="portfolio" class="">
                                <div class="container">
                                    <h2 class="text-center">Videos</h2>
                                    <div class="row portfolio-container mt-8">
                                        @forelse($videos as $data)
                                            <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp filter-active">
                                                <div class="portfolio-wrap">
                                                    <figure>
                                                        <img src="/storage/gallery_videos/{{$data->video_image}}" style = "width:100%; height:100%;"alt="">
                                                        <a href="{{$data->video_link}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                                    </figure>
                                                    <div class="portfolio-info">
                                                        <h4><a href="#">{{$data->video_name}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h3 class="pl-5 text-center">There is no availbale Images</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Sidebar -->
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
                            </div>
                        </div>
                        <!-- end sidebar -->
                    </div>
                </div>
            </div>

        </div>


    </section>




@endsection
