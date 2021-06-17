@extends('layout.layout')
<link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@section('content')
    <section class="breadcrumbs" >
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <div class="section-header wow fadeInUp">
                    <h3>Stores</h3>
                </div>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>

        </div>
    </section>
    <div class="inner-page">
        <div class="container">
            <div class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 py-3">
                        </div>
                        <div class="col-lg-4 py-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
