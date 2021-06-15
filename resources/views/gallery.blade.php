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

    <section class="inner-page mt-4">
        <div class="container-fluid mb-7">
            <section id="portfolio"  class="section-bg" >
                <div class="container">
                    <h2 class="text-center">Images</h2>
                    <div class="row">
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
                                        <p>Description</p>
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
        <div class="container-fluid mb-7">
            <section id="portfolio"  class="section-bg" >
                <div class="container">
                    <h2 class="text-center">Videos</h2>

                    <div class="row portfolio-container">
                        @forelse($videos as $data)
                            <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
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

    </section>




@endsection
