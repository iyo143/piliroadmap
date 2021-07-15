@extends('layout.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('css/stores.css')}}">
@endsection
@section('content')
    @include('layout.partials.sub-header')
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>Stores</h3>
            </header>
            <div class="row about-cols">
                @foreach($stores as $store)
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="team-box text-center bg-white mt-4">
                            <div class="team-img" style="height: 200px">
                                <img src="/storage/stores_image/{{$store->store_image}}" alt="" class="img-fluid rounded">
                                <div class="team-name">
                                    <h5 class="text-white f-18 font-weight-light mb-0">{{$store->store_name}}</h5>
                                </div>
                            </div>
                            <div class="team-content text-center p-3">
                                <div class="">
                                    <p class="f-17 mb-0"><a href="#" class="text-dark">{{$store->store_owner}}</a></p>
                                    <div class="team-social-icon p-2">
                                        <ul class="blog-details-icons list-inline mb-0">
                                            <li class="list-inline-item"><a href="{{$store->fb_link}}" class=""><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="{{$store->ig_link}}" class=""><i class="fab fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="{{$store->twit_link}}" class=""><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <br>
            <div class="d-flex justify-content-center text-success">{{$stores->links()}}</div>

        </div>
    </section>
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p></p>
        </header>
        <div class="row about-cols">
            @foreach($abouts as $about)
              <div class="col-md-4 wow fadeInUp">
                <div class="about-col">
                  <div class="img">
                    <img src="/storage/about_images/{{$about->about_image}}" alt="" class="img-fluid" style="height: 250px;" width="500">
                    <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                  </div>
                  <h2 class="title"><a href="#">{{$about->title}}</a></h2>
                  <p>{{$about->excerpt}}</p>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </section><!-- #about -->


    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Road Map</h3>

        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$trees}}</span>
            <p>Trees</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$farmers}}</span>
            <p>Farmers</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$processors}}</span>
            <p>Processors</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{$retailers}}</span>
            <p>Repondents</p>
  				</div>

  			</div>

        <!-- <div class="facts-img">
          <img src="img/facts-img.png" alt="" class="img-fluid">
        </div> -->
        <div class="facts-img">
          <div id="map" class="map" style="height: 550px;"></div>
        </div>
      </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Gallery</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
                @foreach($galleryCategories as $galleryCategory)
                    <li data-filter=".filter-{{$galleryCategory->gallery_category_name}}">{{$galleryCategory->gallery_category_name}}</li>
                @endforeach
            </ul>
          </div>
        </div>
        <div class="row portfolio-container">
         @forelse($gallery as $data)
          <div class="col-lg-4 col-md-6 portfolio-item filter-{{$data->gallery_category->gallery_category_name}} wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="/storage/gallery_images/{{$data->image_file}}" style = "width:100%; height:100%;"alt="">
                <a href="/storage/gallery_images/{{$data->image_file}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>

              </figure>
              <div class="portfolio-info">
                <h4><a href="#">{{$data->image_name}}</a></h4>
                <p>Description</p>
              </div>
            </div>
          </div>
          @empty
          <h1>There is no availbale Images</h1>
        @endforelse
        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients">
        <div class="container" data-aos="zoom-in">

            <header class="section-header">
                <h3>Our Clients</h3>
            </header>
            <div class="owl-carousel clients-carousel">
                <img src="/partners_logo/DA.png" alt=""width="200px">
                <img src="/partners_logo/denr.png" alt=""width="200px">
                <img src="/partners_logo/dost.png" alt=""width="200px">
                <img src="/partners_logo/ssu.png" alt=""width="200px">
            </div>
        </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">
          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Sorsogon State College, Sorsogon City, Philippines</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+639196626252</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">prm-ssc@example.com</a></p>
            </div>
          </div>
        </div>
        <div class="form">
          <form action="{{route('main.feedback')}}" method="post">
              @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name"  placeholder="Your Name" />
              </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="email"  placeholder="Your Email" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="text" name="country" class="form-control" placeholder="Country"  />
              </div>
              <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="province" placeholder="Province" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="text" name="contact" class="form-control" placeholder="Contact Number" />
              </div>
              <div class="form-group col-md-6">
                  <input type="hidden" name="department_name" id="department_name">
                  <select class="form-control" name="department" onchange="myNewFunction(this)">
                      <option value="" disabled selected>Send to Deparment</option>
                      @foreach($departments as $department)
                          <option value="{{$department->email}}">{{$department->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" />
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="feedback" rows="5" placeholder="Message"></textarea>
            </div>
            <button type="submit">Send Message</button>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
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
            "<h3>{{$data->municipality}}</h3>"+
            "<h5 class='text-center'>{{$data->brgy}}</h5>"+
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
                "<th>Retailers</th>"+
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
    <script>
        function myNewFunction(sel) {
            $('#department_name').val(sel.options[sel.selectedIndex].text);
        }
    </script>
@endsection
