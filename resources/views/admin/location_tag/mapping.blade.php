@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="row ">
            <div class="col-md-4">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        Location Tag successfully added
                    </div>
                @elseif(session('delete'))
                    <div class="alert alert-danger alert-dismissible">
                        {{session('delete')}}
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Location Tags</h3>
                    </div>
                    <form action="{{route('map.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="panel-body">
                        <div class="input-group">
                            <input type="hidden" name="municipality" id="mun">
                            <span class="input-group-addon"><i class="fas fa-globe-asia"></i></span>
                            <select class="form-control" type="text" name="municipality_value" id="municipality" onChange="myNewFunction(this);"></select>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="hidden" name="brgy" id="brgay">
                            <span class="input-group-addon"><i class="fas fa-globe-asia"></i></span>
                            <select class="form-control form-control-user @error('trees') is-invalid @enderror" type="text" name="brgy_value" id="brgy" onchange="myNewFunctionbrgy(this);"></select>
                        </div>
                        @error('brgy')
                        <span class="text-danger" role="alert">
                                  {{ $message }}
                                </span>
                        @enderror
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group flex-wrap">
                                    <span class="input-group-addon"><i class="fas fa-tree"></i></span>
                                    <input class="form-control form-control-user @error('trees') is-invalid @enderror" placeholder="No. of Trees" type="text" name="trees">
                                </div>
                                @error('trees')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-users"></i></span>
                                    <input class="form-control" placeholder="No. of Farmers" type="text" name="farmers">

                                </div>
                                @error('farmers')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-users"></i></span>
                                    <input class="form-control" placeholder="No. of Retailers" type="text" name="retailers">
                                </div>
                                @error('retailers')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-cogs"></i></span>
                                    <input class="form-control" placeholder="No. of Processors" type="text" name="processors">
                                </div>
                                @error('processors')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                     @enderror
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <input class="form-control" placeholder="Lattitude" type="text" name="latitude" id="lat">
                        </div>
                        @error('latitude')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                         @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker"></i></span>
                            <input class="form-control" placeholder="Longitude" type="text" name="longitude" id="long">
                        </div>
                        @error('longitude')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-images"></i></span>
                            <input class="form-control" placeholder="Excerpt" type="file" name="pili_image">
                        </div>
                            @error('pili_image')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                             @enderror
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                    </form>
                </div>


            </div>
            <div class="col-md-8">
                <div id="map" style="height: 500px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">List of Location Tags</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
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
                                    <th>Actions</th>
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
                                            <a href="{{route('map.edit', $data->id)}}" class="btn btn-success"><i class="lnr lnr-pencil"></i></a>
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
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to Delete the User?</h6>
                <form action="{{route('map.destroy','id')}}" method="POST">
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
    var map = L.map('map').setView([13.11166, 123.94458], 11);
    L.tileLayer( 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CxC7aDuJcG77pDH5yjGS', {
        maxZoom: 18,
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    L.Control.geocoder().addTo(map);

    function putDraggables() {
        draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}).addTo(map);
        draggableMarker.on('dragend', function(e) {
            $("#lat").val(this.getLatLng().lat);
            $("#long").val(this.getLatLng().lng);
        });
    }
    $(document).ready(function() {
        putDraggables();
    });

</script>
<script type="text/javascript">
    var my_handlers = {
        fill_barangays: function(){
            var city_code = $(this).val();
            $('#brgy').ph_locations('fetch_list', [{"city_code": city_code}]);
        }
    };
    $(function(){
        $('#municipality').on('change', my_handlers.fill_barangays);
        $('#municipality').ph_locations({'location_type': 'cities'});
        $('#brgy').ph_locations({'location_type': 'barangays'});
        $('#municipality').ph_locations( 'fetch_list', [{"province_code": "0562"}]);
        $('#municipality').val()
    });
    function myNewFunction(sel) {
        $('#mun').val(sel.options[sel.selectedIndex].text);
    }
    function myNewFunctionbrgy(sel) {
        $('#brgay').val(sel.options[sel.selectedIndex].text);
    }
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
