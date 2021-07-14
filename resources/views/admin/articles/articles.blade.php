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
                @elseif (session('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('delete-message') }}
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

                    <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                            <input class="form-control @error('title') is-invalid @enderror" placeholder="Author" type="text" name="author">
                        </div>
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                            <input class=" form-control @error('title') is-invalid @enderror " placeholder="Title" type="text" name="title">
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

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fab fa-tumblr"></i></span>
                            <select name="article_category_id" id="" class="form-control">

                                @foreach ($articleCategories as $articleCategories )
                                    <option value="{{ $articleCategories->id }}">{{ $articleCategories->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('article_category_id')
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
                            <input class="form-control" placeholder="Excerpt" type="file" name="cover_image">

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
                                    <th>Category</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->author}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($data->excerpt, 20)}} </td>
                                    <td>{{ $data->article_category->category_name }}</td>
                                    <td>
                                        <a href="{{route('articles.show', $data->id)}}" class="btn btn-primary"><i class="lnr lnr-eye"></i></a>
                                        <a href="{{route('articles.edit', $data->id)}}" class="btn btn-success"><i class="lnr lnr-pencil"></i></a>
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

                <!-- END TABLE HOVER -->
            </div>
            {{ $articles->links()}}
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
                <form action="{{route('articles.destroy','id')}}" method="POST">
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
            modal.find('.modal-title').text('Delete User');
            modal.find('.modal-body #id').val(user_id);
        });
    </script>

@endsection
