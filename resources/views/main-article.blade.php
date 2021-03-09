@extends('layout.layout')
@section('links')

<link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
@endsection
@section('content')


  <div class="page-section">
    <div class="container">
    <div class="section-header wow fadeInUp pt-100">
          <h3>Articles</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
      <div class="row">
      
        <div class="col-lg-8 py-3">
        @foreach($articles as $data)
          <article class="blog-entry wow fadeInUp">
            <div class="entry-header">
              <div class="post-thumbnail wow fadeInUp">
                <img src="{{asset('assets/img/blog_4.jpg')}}" alt="">
              </div>
              <div class="post-date wow fadeInUp">
                <h3>20</h3>
                <span>Feb</span>
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
            <a href="#" class="btn btn-success">Continue Reading</a>
          </article>
        @endforeach
        
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
                  <img src="../assets/img/blogs/blog_1.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2"><a href="#">{{$data->excerpt}}</a></div>
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
            <h3 class="widget-title wow fadeInUp">Tag Cloud</h3>
            <div class="tag-clouds">
              <a href="#" class="tag-cloud-link">dish</a>
              <a href="#" class="tag-cloud-link">menu</a>
              <a href="#" class="tag-cloud-link">food</a>
              <a href="#" class="tag-cloud-link">sweet</a>
              <a href="#" class="tag-cloud-link">tasty</a>
              <a href="#" class="tag-cloud-link">delicious</a>
              <a href="#" class="tag-cloud-link">desserts</a>
              <a href="#" class="tag-cloud-link">drinks</a>
            </div>
          </div>
          <div class="widget-wrap wow fadeInUp">
            <h3 class="widget-title wow fadeInUp">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div> <!-- end sidebar -->
      </div>
    </div>
  </div>


@endsection