<!--==========================
    Intro Section
  ============================-->

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        @if($viewBanner!=null)
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>{{$viewBanner->title}}</h1>
                    <h2>{{$viewBanner->excerpts}}</h2>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="storage/banner_image/{{$viewBanner->banner_image}}" class="img-fluid animated" alt="">
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Title</h1>
                    <h2>Excerpt</h2>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="image/piliback.png" class="img-fluid animated" alt="">
                </div>
            </div>
        @endif


    </div>
</section>
