@extends('layout.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
    <link rel="stylesheet" href="{{asset('css/stores.css')}}">
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
    <section class="inner-page ">
        <div class="container-fluid">
            <div class="page-section">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-8 py-3">
                            <div class="container" style="margin-right:0">
                                <div class="row">
                                    @for($i = 0; $i<12; $i++)
                                        <div class="col-lg-3 col-md-6 wow fadeInUp">
                                            <div class="team-box text-center bg-white mt-4">
                                                <div class="team-img">
{{--                                                    <img src="/storage/stores_image/{{$store->store_image}}" alt="" class="img-fluid rounded">--}}
                                                    <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid rounded">
                                                    <div class="team-name">
{{--                                                        <h5 class="text-white f-18 font-weight-light mb-0">{{$store->store_name}}</h5>--}}
                                                        <h5 class="text-white f-18 font-weight-light mb-0">Store Name</h5>
                                                    </div>
                                                </div>
                                                <div class="team-content text-center p-3">
                                                    <div class="">
                                                        <p class="f-17 mb-0"><a href="#" class="text-dark">Store Owner</a></p>
                                                        <div class="team-social-icon p-2">
                                                            <ul class="blog-details-icons list-inline mb-0">
                                                                <li class="list-inline-item"><a href="#" class=""><i class="fab fa-facebook-f"></i></a></li>
                                                                <li class="list-inline-item"><a href="#" class=""><i class="fab fa-instagram"></i></a></li>
                                                                <li class="list-inline-item"><a href="#" class=""><i class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
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

                        <!-- end sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
