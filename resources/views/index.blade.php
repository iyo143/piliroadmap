@extends('layout.layout')

@section('content')
    @include('layout.partials.sub-header')
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/intro-carousel/10.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Sorsogon Pili Development Board</a></h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/intro-carousel/12.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Technical Working Group </a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/intro-carousel/14.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Sorsogon Pili Roadmap Program</a></h2>
              <p>
              The Pili Roadmap program is a strategic scheme created through the partnership of the Sorsogon State College and the Provincial Government of Sorsogon in collaboration with the Department of Agriculture (DA), Department of Science and Technology (DOST), Department of Environment and Natural Resources (DENR), Department of Trade and Industry (DTI), Local Government Units (LGU), Pili Processors and Producers Cooperative (PPPC), and other stakeholders to contribute to the efforts to strengthen the pili industry within the province and ultimately, establish Sorsogon Province as the “Pili Capital of the World”.

              </p>
            </div>
          </div>

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
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
            <p>Retailers</p>
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
              <li data-filter=".filter-card">Research gallery</li>
              <li data-filter=".filter-web">Events</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
         @forelse($gallery as $data)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="/storage/gallery_images/{{$data->image_name}}" style = "width:100%; height:100%;"alt="">
                <a href="/storage/gallery_images/{{$data->image_name}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>
              <div class="portfolio-info">
                <h4><a href="#">{{$data->folders_for}}</a></h4>
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
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Partner Agencies</h3>
        </header>

        <div class="owl-carousel clients-carousel">

        </div>

      </div>
    </section><!-- #clients -->



    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-ro">
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Department" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
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
@endsection