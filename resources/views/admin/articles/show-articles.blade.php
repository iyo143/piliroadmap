@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 ">
                    <div class="panel justify-content-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Show Article</h3>
                        </div>
                        <div class="title" style="padding: 0 30%">
                            <h3 class="text-center text-dark" >{{$article->title}}</h3>
                        </div>
                        <div class="cover-image text-center" style="padding: 0 10%">
                            <img src="/storage/article_images/{{$article->cover_image}}" alt="" class="img-thumbnail">
                        </div>
                        <div class="body-content" style="padding: 0 10%">
                            <p class="text-center">{!!$article->body!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
