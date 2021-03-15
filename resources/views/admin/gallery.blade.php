@extends('layout.admin.admin-layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="row">
        <div class="col-md-5">
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
                            <input class="form-control" placeholder="Excerpt" type="file" name="image_name">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-folder"></i></span>
                            <input class="form-control" placeholder="Folders For" type="text" name="folders_for">
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>              
                    </div>
                    </form>
                </div>
           
                
            </div>
           
                <!-- END TABLE HOVER -->
            </div>
        </div>
        
    </div>
</div>
@endsection