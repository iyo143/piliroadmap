@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            Article Successfully added!
                        </div>
                    @elseif (session('delete-message'))
                        <div class="alert alert-danger alert-dismissible">
                            {{ session('delete-message') }}
                        </div>
                    @endif

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Publish Article</h3>
                        </div>

                        <form action="{{route('articles.update', $article->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                    <input class="form-control" placeholder="Author" type="text" name="author" value="{{$article->author}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                    <input class="form-control" placeholder="Title" type="text" name="title" value="{{$article->title}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                    <input class="form-control" placeholder="Excerpt" type="text" name="excerpt" value="{{$article->excerpt}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                    <select name="article_category_id" id="" class="form-control">
                                            <option selected = "selected" value="{{$article->article_category->id}}">{{$article->article_category->category_name}}</option>
                                        @foreach ($articleCategories as $articleCategories )
                                            <option value="{{ $articleCategories->id }}">{{ $articleCategories->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <textarea name="body" id="" cols="30" rows="10">{!!$article->body!!}</textarea>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-images"></i></span>
                                    <input class="form-control" placeholder="Excerpt" type="file" name="cover_image">
                                </div>
                                <br>
                                <button class="btn btn-success btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
@endsection

