@extends('layout.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/mobster.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/archives.scss')}}">
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
                            <header>
                                <h1>Cool Articles</h1>
                            </header>
                            <div class="band">
                                <div class="item-1">
                                    <a href="https://design.tutsplus.com/articles/international-artist-feature-malaysia--cms-26852" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/flex-1.jpg);"></div>
                                        <article>
                                            <h1>International Artist Feature: Malaysia</h1>
                                            <span>Mary Winkler</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-2">
                                    <a href="https://webdesign.tutsplus.com/articles/how-to-conduct-remote-usability-testing--cms-27045" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/users-2.png);"></div>
                                        <article>
                                            <h1>How to Conduct Remote Usability Testing</h1>
                                            <span>Harry Brignull</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-3">
                                    <a href="https://design.tutsplus.com/articles/envato-tuts-community-challenge-created-by-you-july-edition--cms-26724" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/flex-5.jpg);"></div>
                                        <article>
                                            <h1>Created by You, July Edition</h1>
                                            <p>Welcome to our monthly feature of fantastic tutorial results created by you, the Envato Tuts+ community! </p>
                                            <span>Melody Nieves</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-4">
                                    <a href="https://webdesign.tutsplus.com/tutorials/how-to-code-a-scrolling-alien-lander-website--cms-26826" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/landing.png);"></div>
                                        <article>
                                            <h1>How to Code a Scrolling “Alien Lander” Website</h1>
                                            <p>We’ll be putting things together so that as you scroll down from the top of the page you’ll see an “Alien Lander” making its way to touch down.</p>
                                            <span>Kezz Bracey</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-5">
                                    <a href="https://design.tutsplus.com/tutorials/stranger-things-inspired-text-effect--cms-27139" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/strange.jpg);"></div>
                                        <article>
                                            <h1>How to Create a “Stranger Things” Text Effect in Adobe Photoshop</h1>
                                            <span>Rose</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-6">
                                    <a href="https://photography.tutsplus.com/articles/5-inspirational-business-portraits-and-how-to-make-your-own--cms-27338" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/flor.jpg);"></div>
                                        <article>
                                            <h1>5 Inspirational Business Portraits and How to Make Your Own</h1>

                                            <span>Marie Gardiner</span>
                                        </article>
                                    </a>
                                </div>
                                <div class="item-7">
                                    <a href="https://webdesign.tutsplus.com/articles/notes-from-behind-the-firewall-the-state-of-web-design-in-china--cms-22281" class="card">
                                        <div class="thumb" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/china.png);"></div>
                                        <article>
                                            <h1>Notes From Behind the Firewall: The State of Web Design in China</h1>
                                            <span>Kendra Schaefer</span>
                                        </article>
                                    </a>
                                </div>
                            </div>
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
