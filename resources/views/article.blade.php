@extends('layout.layout')
<link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@section('content')
<div class="page-section">

    @include('layout.partials.sub-header-2')
    <section class="breadcrumbs section-bg" >
        <div class="container padding-20">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-header wow fadeInUp">
                    <h3>Article</h3>
                </div>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="section-header wow fadeInUp pt-100">
          <h3>Articles</h3>

        </div>
      <div class="row">

        <div class="col-lg-8 py-3 ">
            <h2 class="font-weight-normal text-uppercase py-4">{{$article->title}}</h2>
            <div class="row px-4 border-top pt-4">
                <p><i class="far fa-clock"></i> {{$article->created_at->format('M d Y')}}| Posted by: {{$article->author}}</p>
            </div>
            <div class="" >
                <img style="width:100%;" src="/storage/article_images/{{$article->cover_image}}" alt="">
            </div>
            <div class="border-bottom"></div>
            <p>{!!$article->body!!}</p>
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
              @foreach($articles->slice(0, 5) as $data)
              <div class="blog-widget">
                <div class="blog-img">
                  <img src="/storage/article_images/{{$data->cover_image}}" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2"><a href="#">{{$data->title}}</a></div>
                  <div class="meta">
                    <a href="#"><span class="icon-person"></span>{{$data->created_at->format('M d Y')}}</a>
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
            <h3 class="widget-title wow fadeInUp">About us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div> <!-- end sidebar -->
      </div>
    </div>
  </div>

@endsection
