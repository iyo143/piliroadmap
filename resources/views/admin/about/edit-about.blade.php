@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Publish Article</h3>
                            </div>

                            <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                        <input class=" form-control @error('title') is-invalid @enderror " placeholder="Title" type="text" name="title" value="title">
                                    </div>
                                    @error('title')
                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                                        <input class="form-control" placeholder="Excerpt" type="text" name="excerpt">
                                    </div>
                                    @error('excerpt')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <textarea name="body" id="" cols="30" rows="10"></textarea>
                                    @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-images"></i></span>
                                        <input class="form-control" placeholder="Excerpt" type="file" name="about_image">
                                    </div>
                                    @error('cover_image')
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
                    <div class="col-md-12">
                        @foreach($abouts as $about)
                            <div class="panel justify-content-center">
                                <div class="panel-heading">
                                    <h3>Banner Content</h3>
                                </div>
                                <div class="title" style="padding: 2% 6%">
                                    <h3 class="text-center text-dark text-uppercase" >{{$about->title}}</h3>
                                </div>
                                <div class="title" style="padding: 2% 6%">
                                    <h4 class="text-center text-dark text-uppercase" >{{$about->excerpt}}</h4>
                                </div>

                                <div class="cover-image text-center" style="padding: 0 10%">
                                    <img src="/storage/about_images/{{$about->about_image}}" alt="" class="img-thumbnail" width="400">
                                </div>
                                <div class="body-content" style="padding: 0 15%">
                                    <p class="text-center">{!!$about->body!!}</p>
                                </div>
                                <div class="text-center" style="padding: 20px" >
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a data-target="#DeleteModal" data-id="{{$about->id}}"
                                       data-toggle="modal" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                        <br>
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
                        <form action="{{route('about.destroy','id')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id">
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
