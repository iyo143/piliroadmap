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
                @endif
       
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Publish Article</h3>
                    </div>
                   
                    <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                            <input class="form-control" placeholder="Author" type="text" name="author">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                            <input class="form-control" placeholder="Title" type="text" name="title">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="text" name="excerpt">
                        </div>
                        <br>
                        <textarea name="body" id="" cols="30" rows="10"></textarea>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="file" name="cover_image">
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>              
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- TABLE HOVER -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Published Articles</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Excerpt</th>
                             
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->author}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->excerpt}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="" class="btn btn-success"><i class="far fa-edit"></i></a>
                                        <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
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