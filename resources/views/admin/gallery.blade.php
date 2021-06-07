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

                    <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Image Name" type="text" name="image_name">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="file" name="image_file">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-folder"></i></span>
                            <select name="gallery_category_id" id="" class="form-control">
                                @foreach ($galleryCategories as $galleryCategory )
                                    <option value="{{ $galleryCategory->id }}">{{ $galleryCategory->gallery_category_name }}</option>
                                @endforeach
                            </select>
                        </div>
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
                                <input class="form-control" placeholder="Category Name" type="text" name="category_name">
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            </div>
            <div class="col-md-12">
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
                                                    <a  href=""
                                                        class="btn btn-success btn-circle"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit">
                                                        <i
                                                            class="fas fa-edit">
                                                        </i>
                                                    </a>
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


    </div>
</div>
@endsection
