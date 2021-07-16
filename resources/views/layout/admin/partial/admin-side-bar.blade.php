<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{route('home')}}" class="{{Request::path()=== 'home' ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{route('home.mapping')}}" class="{{Request::path()=== 'home/mapping' ? 'active' : ''}}"><i class="fas fa-map-marked-alt"></i> <span>Mapping</span></a></li>
						<li><a href="{{route('home.articles')}}" class="{{Request::path()=== 'home/articles' ? 'active' : ''}}"><i class="far fa-newspaper"></i><span>Articles</span></a></li>
						<li><a href="{{route('home.gallery')}}" class="{{Request::path()=== 'home/gallery' ? 'active' : ''}}"><i class="fas fa-images"></i><span>Gallery</span></a></li>
						<li><a href="{{route('home.about')}}" class="{{Request::path()=== 'home/about' ? 'active' : ''}}"><i class="fas fa-question-circle"></i><span>About us</span></a></li>
						<li><a href="{{route('home.archive')}}" class="{{Request::path()=== 'home/archives' ? 'active' : ''}}"><i class="far fa-file-archive"></i><span>Archives</span></a></li>
						<li><a href="{{route('home.contact')}}" class="{{Request::path()=== 'home/contact' ? 'active' : ''}}"><i class="fas fa-phone"></i><span>Contact Us</span></a></li>
                        <li><a href="{{route('home.stores')}}" class="{{Request::path()=== 'home/stores' ? 'active' : ''}}"><i class="fas fa-shopping-bag"></i><span>Stores</span></a></li>
                        <li><a href="{{route('home.banner')}}" class="{{Request::path()=== 'home/banner' ? 'active' : ''}}"><i class="fas fa-ribbon"></i><span>Banner</span></a></li>
                        <li><a href="{{route('home.partner')}}" class="{{Request::path()=== 'home/partner' ? 'active' : ''}}"><i class="fas fa-ribbon"></i><span>Partners</span></a></li>
                    </ul>
				</nav>
			</div>
		</div>
