@extends('layout.admin.admin-layout')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        @if(session('success_message'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('success_message')}}
                            </div>
                        @elseif (session('delete-message'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ session('delete-message') }}
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
                                        <input class="form-control" placeholder="PDF Name" type="text" name="pdf_name">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-images"></i></span>
                                        <input class="form-control" placeholder="Excerpt" type="file" name="pdf_file">
                                    </div>
                                    <br>
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </form>
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
                    <h4>Are you sure you want to Delete the User?</h4>
                    <form action="{{route('articles.destroy','id')}}" method="POST">
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
