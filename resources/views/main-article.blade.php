@extends('layout.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@endsection
@section('content')
    <section class="breadcrumbs" >
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <div class="section-header wow fadeInUp">
                    <h3>Articles</h3>
                </div>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="inner-page mt-4">
        <div class="container">
            <div class="page-section">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 py-3">
                            @forelse($articles as $data)
                                <article class="blog-entry wow fadeInUp">
                                    <div class="entry-header">
                                        <div class="post-thumbnail wow fadeInUp">
                                            <img src="/storage/article_images/{{$data->cover_image}}" alt="">
                                        </div>
                                        <div class="post-date wow fadeInUp">
                                            <h3>{{$data->created_at->format('d')}}</h3>
                                            <span>{{$data->created_at->format('M')}}</span>
                                        </div>
                                    </div>
                                    <div class="post-title"><a href="blog-details.html">{{$data->title}}</a></div>
                                    <div class="entry-meta mb-2">
                                        <div class="meta-item entry-author">
                                            <div class="icon">
                                                <span class="mai-person"></span>
                                            </div>
                                            by <a href="#">{{$data->author}}</a>
                                        </div>

                                    </div>
                                    <div class="entry-content">
                                        <p>{{$data->excerpt}}</p>
                                    </div>
                                    <a href="{{route('main.article',$data->id)}}" class="btn btn-success">Continue Reading</a>
                                </article>
                            @empty
                                <h4 class="text-center mt-4">There is no Available Article</h4>
                            @endforelse

                        </div>
                        <!-- Sidebar -->
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
                        <!-- end sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
