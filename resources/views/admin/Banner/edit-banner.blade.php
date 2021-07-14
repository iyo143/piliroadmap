@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @if(session('success_message'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('success_message')}}
                            </div>
                        @elseif (session('delete_message'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ session('delete_message') }}
                            </div>
                        @elseif (session('update_message'))
                            <div class="alert alert-success alert-dismissible">
                                {{ session('update_message') }}
                            </div>
                        @endif

                        <div class="panel justify-content-center">
                            <div class="panel-heading">
                                <h3 class="panel-title">Publish Article</h3>
                            </div>

                            <form action="{{route('banner.update', $banner->id)}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input class="form-control @error('title') is-invalid @enderror" placeholder="Title" type="text" name="title" value="{{$banner->title}}">
                                    </div>
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                        <input class=" form-control @error('excerpts') is-invalid @enderror " placeholder="Excerpt" type="text" name="excerpts" value="{{$banner->excerpts}}">
                                    </div>
                                    <br>
                                    @error('excerpts')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="body" id="" cols="30" rows="10">{{$banner->body}}</textarea>
                                    @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-images"></i></span>
                                        <input class="form-control" placeholder="Banner Image" type="file" name="banner_image">
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <img src="/storage/banner_image/{{$banner->banner_image}}" alt="" width="500">

                                    </div>
                                    <br>
                                    @error('banner_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <button class="btn btn-success btn-block" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
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
