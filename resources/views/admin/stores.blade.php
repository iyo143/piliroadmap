@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="row">
            <div class="col-md-4">
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
    </div>
</div>
@endsection
