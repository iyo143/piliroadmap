@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success_add'))
                    <div class="alert alert-success alert-dismissible">
                        {{session('success_add')}}
                    </div>
                @elseif (session('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('delete-message') }}
                    </div>
                @elseif (session('update-message'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('update-message') }}
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Stores</h3>
                    </div>
                    <form action="{{route('stores.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-store"></i></span>
                                <input class="form-control" placeholder="Store Name" type="text" name="store_name" id="lat">
                            </div>
                            @error('store_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input class="form-control" placeholder="Store Owner" type="text" name="store_owner" id="lat">
                            </div>
                            @error('store_owner')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fab fa-facebook-f"></i></span>
                                <input class="form-control" placeholder="Facebook link" type="text" name="fb_link" id="lat">
                            </div>
                            @error('fb_link')
                            <div class="text-danger">Facebook Link is required</div>
                            @enderror
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fab fa-instagram"></i></span>
                                <input class="form-control" placeholder="Instagram Link" type="text" name="ig_link" id="lat">
                            </div>
                            @error('ig_link')
                            <div class="text-danger">Facebook Link is required</div>
                            @enderror
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fab fa-twitter"></i></span>
                                <input class="form-control" placeholder="Twitter Link" type="text" name="twit_link" id="lat">
                            </div>
                            @error('twit_link')
                            <div class="text-danger">Facebook Link is required</div>
                            @enderror
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-store"></i></span>
                                <input class="form-control" placeholder="Thumbnail" type="file" name="store_image" id="lat">
                            </div>
                            @error('store_image')
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
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            List of Stores
                        </h3>
                        <div class="panel-body">
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Store Name</th>
                                    <th>Store Owner</th>
                                    <th>Facebook Link</th>
                                    <th>Instagram Link</th>
                                    <th>Twitter Link</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stores as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->store_name}}</td>
                                        <td>{{$data->store_owner}}</td>
                                        <td>{{$data->fb_link}}</td>
                                        <td>{{$data->ig_link}}</td>
                                        <td>{{$data->twit_link}}</td>

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
                                            <a href="{{route('stores.edit', $data->id)}}" class="btn btn-success"><i class="lnr lnr-pencil"></i></a>
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
                
                <h4>Are you sure you want to delete this Store?</h4>
                <form action="{{route('stores.destroy','id')}}" method="POST">
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
<div class="modal fade" id="View" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{route('stores.destroy','id')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            modal.find('.modal-title').text('Delete Store');
            modal.find('.modal-body #id').val(user_id);
        });
    </script>

@endsection
