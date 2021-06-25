@extends('layout.layout')
@section('links')

    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@endsection
@section('content')
    <section class="breadcrumbs" >
        <div class="container">
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
                            <section id="portfolio" class=" mt-5" >
                                <div class="container">
                                    <h2 class="text-center">Images</h2>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <ul id="portfolio-flters">
                                                <li data-filter="*" class="filter-active">All</li>
                                                @foreach($galleryCategories as $galleryCategory)
                                                    <li data-filter=".filter-{{$galleryCategory->gallery_category_name}}">{{$galleryCategory->gallery_category_name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row portfolio-container">
                                        @forelse($images as $data)
                                            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$data->gallery_category->gallery_category_name}} wow fadeInUp">
                                                <div class="portfolio-wrap">
                                                    <figure>
                                                        <img src="/storage/gallery_images/{{$data->image_file}}" style = "width:100%; height:100%;"alt="">
                                                        <a href="/storage/gallery_images/{{$data->image_file}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>

                                                    </figure>
                                                    <div class="portfolio-info">
                                                        <h4><a href="#">{{$data->image_name}}</a></h4>
                                                        <p>{{$data->gallery_category->gallery_category_name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h3 class="pl-5 align-self-center">There is no availbale Images</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </section>
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
                        <div class="col-lg-2 py-3">
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
                                                <a href="#"><span class="icon-calendar"></span> July 12, 2018</a>
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
                        <!-- end sidebar -->
                    </div>
                </div>
            </div>

        </div>


    </section>




@endsection
