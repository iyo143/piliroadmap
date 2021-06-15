<!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

    <div id="logo" class="pull-left">
        <div class="row">
          <h1><a href="#intro" class="scrollto"></a></h1>
          <div class="logo"></div>
        </div>
    </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{route('homePage')}}">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Archives</a></li>
          <li><a href="{{route('main.gallery')}}">Gallery</a></li>
          <li class="menu-has-children"><a href="#">Articles</a>
            <ul>
              @foreach ($categories as $category)
                <li><a href="{{ route('main.articles', $category->id) }}">{{$category->category_name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
