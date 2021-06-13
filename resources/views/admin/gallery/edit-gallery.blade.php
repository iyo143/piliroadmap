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
                    @endif
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Insert Image</h3>
                        </div>

                        <form action="{{route('gallery.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-images"></i></span>
                                    <input class="form-control" placeholder="Image Name" type="text" name="image_name" value="{{$gallery->image_name}}">
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
                                        <option value="{{$gallery->id}}">{{$gallery->gallery_category->gallery_category_name}}</option>
                                        @foreach ($galleryCategories as $galleryCategory )
                                            @if($galleryCategory->id != $gallery->gallery_category->id)
                                            <option value="{{ $galleryCategory->id }}">{{ $galleryCategory->gallery_category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @error('gallery_category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <button class="btn btn-success btn-block" type="submit">Update</button>
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
                            @foreach($galleries as $data)

                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->image_name}}</td>
                                    <td><img src="/storage/gallery_images/{{$data->image_file}}" width="25"></td>
                                    <td>{{$data->gallery_category->gallery_category_name}}</td>

                                    <td>
                                        <span>
                                            <a  href=""
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
                                <th>Category Name</th>

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
                                                    href=""
                                                    class="btn btn-primary btn-circle"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="View">
                                                    <i
                                                    class="fas fa-eye">
                                                    </i>
                                                </a>
                                            </span>
                                        <a href="{{route('gallery.edit', $data->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
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
        </div>
    </div>

    <div class="modal fade " data-backdrop="static" data-keyboard="false" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="validateform" class="cmxform">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Image Name" type="text" name="image_name" id="image_name">
                        </div>
                        <br>
                        @error('image_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="file" name="image_file" id="image_file">
                        </div>
                        <br>
                        @error('image_file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-folder"></i></span>
                            <select name="gallery_category_id" id="gallery_category" class="form-control">
                                <option value="" selected="selected" id="gallery_category_option"></option>
                                @foreach ($galleryCategories as $galleryCategory )
                                    <option value="{{ $galleryCategory->id }}">{{ $galleryCategory->gallery_category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('gallery_category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary justify-content-center btn-save-change">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
    <script>
        $('#editModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var user_id = button.data('id');
            var image_name = button.data('image_name');
            var image_file = button.data('image_file');
            var gallery_category_name = button.data('gallery_category_name');
            var gallery_category_id = button.data('gallery_category_id');

            var modal = $(this);
            gallery_category.add(myOption);
            modal.find('.modal-title').text('Edit asdf');
            modal.find('.modal-body #id').val(user_id);
            modal.find('.modal-body #image_name').val(image_name);
            modal.find('.modal-body #image_file').val(image_file);
            modal.find('.modal-body #gallery_category #gallery_category_option').text(gallery_category_name);
        });
    </script>
@endsection
