@extends('layout.admin.admin-layout')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Location Tags Overview</h3>

						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fas fa-tree"></i></span>
										<p>
											<span class="number">{{$countTrees}}</span>
											<span class="title">Trees</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fas fa-users-cog"></i></span>
										<p>
											<span class="number">{{$countProcessors}}</span>
											<span class="title">Processors</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fas fa-store"></i></span>
										<p>
											<span class="number">{{$countRespondents}}</span>
											<span class="title">Respondents</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fas fa-users"></i></span>
										<p>
											<span class="number">{{$countFarmers}}</span>
											<span class="title">Farmers</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="map" class="map" style="height: 500px; position: relative;"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Recent Published Articles</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>

                                                <tr>
                                                    <th>Department</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Excerpt</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
										</thead>
										<tbody>
                                            @foreach($articles as $article)
                                                <tr>
                                                    <td>{{$article->user->name}}</td>
                                                    <td>{{$article->author}}</td>
                                                    <td>{{$article->title}}</td>
                                                    <td>{{\Illuminate\Support\Str::limit($article->excerpt, 20)}} </td>
                                                    <td>{{$article->article_category->category_name}}</td>
                                                    <td><a href="{{route('articles.show', $article->id)}}"><span class="label label-success">View</span></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 10 entries</span></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Records</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Added Image in Gallery</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>

                                        <tr>
                                            <th>Department</th>
                                            <th>Image Name</th>
                                            <th>Image Photo</th>
                                            <th>Category</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($galleries as $gallery)
                                            <tr>
                                                <td>{{$gallery->user->name}}</td>
                                                <td>{{$gallery->image_name}}</td>
                                                <td><img src="/storage/gallery_images/{{$gallery->image_file}}" alt="" width="50"></td>
                                                <td><a href="{{route('articles.show', $gallery->id)}}"><span class="label label-success">View</span></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 10 entries</span></div>
                                        <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Records</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Added Video in Gallery</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>

                                        <tr>
                                            <th>Department</th>
                                            <th>Video Name</th>
                                            <th>Video Photo</th>
                                            <th>Video Link</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($videos as $gallery)
                                            <tr>
                                                <td>{{$gallery->user->name}}</td>
                                                <td>{{$gallery->video_name}}</td>
                                                <td><img src="/storage/gallery_videos/{{$gallery->video_image}}" alt="" width="50"></td>
                                                <td>{{$gallery->video_link}}</td>

                                                <td><a href="{{route('articles.show', $gallery->id)}}"><span class="label label-success">View</span></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 10 entries</span></div>
                                        <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Records</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- RECENT PURCHASES -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Added Location Tags</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Barangay</th>
                                                <th>Municipality</th>
                                                <th>Farmers</th>
                                                <th>Respondents</th>
                                                <th>Processors</th>
                                                <th>Trees</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($locationTags as $locationTag)
                                            <tr>
                                                <td>{{$locationTag->user->name}}</td>
                                                <td>{{$locationTag->brgy}}</td>
                                                <td>{{$locationTag->municipality}}</td>
                                                <td>{{$locationTag->farmers}}</td>
                                                <td>{{$locationTag->respondents}}</td>
                                                <td>{{$locationTag->processors}}</td>
                                                <td>{{$locationTag->trees}}</td>
                                                <td>{{$locationTag->latitude}}</td>
                                                <td>{{$locationTag->longitude}}</td>
                                                <td><span class="label label-success">View</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i>Last 10 entries</span></div>
                                        <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Records</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END RECENT PURCHASES -->
                        </div>
                    </div>

					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
@endsection
@section('scripts')
<script type="text/javascript">
    var map = L.map('map').setView([12.978312,124.011375], 10);
    L.tileLayer( 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CxC7aDuJcG77pDH5yjGS', {
        maxZoom: 18,
        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    @foreach($location as $data)
    var marker = L.marker([{{$data->latitude}}, {{$data->longitude}}]).addTo(map);
    marker.bindPopup("<img src='/storage/location_images/{{$data->pili_image}}' width='300'>"+
        "<hr>"+
        "<table class='table table-dark'>" +
        "<div class='section-header'>"+
            "<h3 class= 'text-center'>{{$data->brgy}}</h3>"+
            "<h5 class='text-center'>{{$data->municipality}}</h5>"+
       " </div"+
            "<tr>" +
                "<th>Processors</th>"+
                "<td>{{$data->processors}}"+
            "</tr>"+
            "<tr>" +
                "<th>Trees</th>"+
                "<td>{{$data->trees}}"+
            "</tr>"+
            "<tr>" +
                "<th>Respondents</th>"+
                "<td>{{$data->retailers}}"+
            "</tr>"+
            "<tr>" +
                "<th>farmers</th>"+
                "<td>{{$data->farmers}}"+

            "</tr>"+

        "</table>"
       );
    @endforeach
  </script>
@endsection
