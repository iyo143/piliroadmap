@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="row ">
            <div class="col-md-6">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        Location Tag successfully added
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Location Tags</h3>
                    </div>
                    <form action="{{route('map.store')}}" method="post">
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-globe-asia"></i></span>
                            <input class="form-control" placeholder="Baranggay" type="text" name="brgy">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-globe-asia"></i></span>
                            <input class="form-control" placeholder="Municipality" type="text" name="municipality">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-tree"></i></span>
                                    <input class="form-control" placeholder="No. of Trees" type="text" name="trees">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-users"></i></span>
                                    <input class="form-control" placeholder="No. ofFarmers" type="text" name="farmers">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-users"></i></span>
                                    <input class="form-control" placeholder="No. of Retailers" type="text" name="retailers">
                                </div>
                            </div>
                            <div class="col-md-3">                        
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-cogs"></i></span>
                                    <input class="form-control" placeholder="No. of Processors" type="text" name="processors">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <input class="form-control" placeholder="Lattitude" type="text" name="latitude">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker"></i></span>
                            <input class="form-control" placeholder="Longitude" type="text" name="longitude">
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>              
                    </div>
                    </form>
                </div>
                
            </div>
            <div class="col-md-6">
                <!-- TABLE HOVER -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Location Tags</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Baranggay</th>
                                    <th>Municipality</th>
                                    <th>Trees</th>
                                    <th>Retailers</th>
                                    <th>Processors</th>
                                    <th>Farmers</th>
                                    <th>Lattitude</th>
                                    <th>Longitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($location as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->brgy}}</td>
                                    <td>{{$data->municipality}}</td>
                                    <td>{{$data->trees}}</td>
                                    <td>{{$data->retailers}}</td>
                                    <td>{{$data->processors}}</td>
                                    <td>{{$data->farmers}}</td>
                                    <td>{{$data->latitude}}</td>
                                    <td>{{$data->longitude}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
            </div>
        </div>
    </div>
</div>
@endsection