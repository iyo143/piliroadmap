@extends('layout.admin.admin-layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        {{session('message')}}
                    </div>
                @elseif(session('delete_message'))
                    <div class="alert alert-danger alert-dismissible">
                        {{session('delete_message')}}
                    </div>
                @elseif(session('update_message'))
                    <div class="alert alert-success alert-dismissible">
                        {{session('update_message')}}
                    </div>
                @elseif(session('delete_gal_category'))
                    <div class="alert alert-danger alert-dismissible">
                        {{session('delete_gal_category')}}
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Insert Image</h3>
                    </div>

                    <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Image Name" type="text" name="image_name">
                        </div>
                        @error('image_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="file" name="image_file">
                        </div>
                        @error('image_file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-folder"></i></span>
                            <select name="gallery_category_id" id="" class="form-control">
                                @foreach ($galleryCategories as $galleryCategory )
                                    <option value="{{ $galleryCategory->id }}">{{ $galleryCategory->gallery_category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('gallery_category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                @if(session('cat_message'))
                    <div class="alert alert-success alert-dismissible">
                        {{session('cat_message')}}
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Insert Gallery Category</h3>
                    </div>

                    <form action="{{route('galCategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-images"></i></span>
                                <input class="form-control" placeholder="Category Name" type="text" name="gallery_category_name">
                            </div>
                            @error('gallery_category_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Images</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image Name</th>
                                <th>Image</th>
                                <th>Folders For</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gallery as $data)
                                {{$categoryname = $data->gallery_category->gallery_category_name}}
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->image_name}}</td>
                                    <td><img src="/storage/gallery_images/{{$data->image_file}}" width="25"></td>
                                    <td>{{$data->gallery_category->gallery_category_name}}</td>

                                    <td>
                                        <span data-id="{{$data->id}}"
                                              data-image_name = "{{$data->image_name}}"
                                              data-image_file = "/storage/gallery_images/{{$data->image_file}}"
                                              data-gallery_category_name = "{{$data->gallery_category->gallery_category_name}}"
                                              data-target="#ShowModal"
                                              data-toggle="modal">
                                            <a
                                                class="btn btn-primary btn-circle"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="View">
                                                <i
                                                    class="fas fa-eye">
                                                </i>
                                            </a>
                                        </span>
                                        <span>
                                            <a href="{{route('gallery.edit', $data->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                        </span>
                                        <span data-id="{{$data->id}}"
                                              data-target="#DeleteModal"
                                              data-toggle="modal" >
                                                <a
                                                    class="btn btn-danger btn-circle"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete">
                                                    <i
                                                        class="fas fa-trash-alt">
                                                    </i>
                                                </a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Category</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Category Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleryCategories as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->gallery_category_name}}</td>
                                    <td>
                                        <span>
                                            <a
                                                class="btn btn-primary btn-circle"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="View">
                                                <i
                                                    class="lnr lnr-eye">
                                                </i>
                                            </a>
                                        </span>
                                        <span
                                          data-id="{{$data->id}}"
                                          data-target="#DeleteGalModal"
                                          data-toggle="modal" >
                                            <a
                                                class="btn btn-danger btn-circle"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Delete">
                                                <i
                                                    class="lnr lnr-trash">
                                                </i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                <form action="{{route('gallery.destroy','id')}}" method="POST">
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
<div class="modal fade" id="DeleteGalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{route('galCategory.destroy','id')}}" method="POST">
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
{{--Show Modal--}}
<div class="modal fade"
     id="ShowModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- w-100 class so that header
        div covers 100% width of parent div -->
                <h1 class="modal-title w-100 text-center"
                    id="image_name">
                </h1>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                            <span aria-hidden="true">
                              ×
                          </span>
                </button>
            </div>

            <!--Modal body with image-->
            <div class="modal-body">
                <h3 id="heading"></h3>
                <div class="" style="width: 100%">
                    <img class="first_img img-thumbnail" src="" id="image" />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-danger"
                        data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
{{--End Show Modal--}}
@endsection
@section('scripts')
    <script>
        $('#ShowModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var image_name = button.data('image_name')
            var image_file = button.data('image_file');
            var modal = $(this);
            modal.find('.modal-body #image').attr("src", image_file);
            modal.find('#image_name').text( image_name);
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
    <script>
        $('#DeleteGalModal').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget);
            var user_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Delete User');
            modal.find('.modal-body #id').val(user_id);
        });
    </script>
@endsection
