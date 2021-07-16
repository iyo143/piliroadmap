@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="row ">
                    <div class="col-md-10 ">
                        @if(session('success_message'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('success_message')}}
                            </div>
                        @elseif (session('delete_message'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ session('delete_message') }}
                            </div>
                        @endif

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Publish Archive</h3>
                            </div>
                            <form action="{{route('archives.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input class="form-control" placeholder="Agency Name" type="text" name="agency_name" value="{{old('agency_name')}}">
                                    </div>
                                    @error('agency_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input class="form-control" placeholder="Agency Link" type="text" name="agency_link" value="{{old('agency_link')}}">
                                    </div>
                                    @error('agency_link')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-image"></i></span>
                                        <input class="form-control" placeholder="Agency Logo" type="file" name="agency_logo">
                                    </div>
                                    @error('pdf_thumbnail')
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
                                        <th>PDF NAME</th>
                                        <th>PDF DESCRIPTION</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($agencies as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->agency_name}}</td>
                                            <td>{{$data->agency_link}}</td>
                                            <td><img src="/storage/partner_images/{{$data->agency_logo}}" width="25"></td>
                                            <td>
                                                <a href="{{route('archives.show', $data->id)}}" class="btn btn-primary"><i class="lnr lnr-eye"></i></a>
                                                <a href="{{route('archives.download', $data->id)}}" class="btn btn-success"><i class="lnr lnr-download"></i></a>
                                                <span data-id="{{$data->id}}"
                                                      data-target="#DeleteModal"
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
                {{ $agencies->links()}}

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
                    <form action="{{route('archives.destroy','id')}}" method="POST">
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
