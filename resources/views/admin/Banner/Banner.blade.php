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

                            <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input class="form-control @error('title') is-invalid @enderror" placeholder="Title" type="text" name="title">
                                    </div>
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                        <input class=" form-control @error('excerpts') is-invalid @enderror " placeholder="Excerpt" type="text" name="excerpts">
                                    </div>
                                    <br>
                                    @error('excerpts')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="body" id="" cols="30" rows="10"></textarea>
                                    @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-images"></i></span>
                                        <input class="form-control" placeholder="Banner Image" type="file" name="banner_image">
                                    </div>
                                    @error('banner_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        @foreach($banners as $banner)
                            <div class="panel justify-content-center">
                                <div class="panel-heading">
                                    <h3>Banner Content</h3>
                                </div>
                                <div class="title" style="padding: 2% 6%">
                                    <h3 class="text-center text-dark text-uppercase" >{{$banner->title}}</h3>
                                </div>
                                <div class="cover-image text-center" style="padding: 0 10%">
                                    <img src="/storage/banner_image/{{$banner->banner_image}}" alt="" class="img-thumbnail">
                                </div>
                                <div class="body-content" style="padding: 0 15%">
                                    <p class="text-center">{!!$banner->body!!}</p>
                                </div>
                                <div class="text-center" style="padding: 20px" >
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a data-target="#DeleteModal" data-id="{{$banner->id}}"
                                       data-toggle="modal" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                            <br>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deletion</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to Delete the User?</h4>
                    <form action="{{route('banner.destroy','id')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <input type="text" name="id" id="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
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
    <script>
        $('#DeleteModal').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget);
            var user_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Delete User');
            modal.find('.modal-body #id').val(user_id);
        });
    </script>

@endsection
