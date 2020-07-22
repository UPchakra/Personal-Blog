<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="{{asset('public//front/images/chakra.png')}}" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="{{route('index')}}">Home</a></li>
				<li><a href="{{route('allpost')}}">Posts</a></li>
				<li><a href="#">Features</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form method="get" action="{{route('search')}}">
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" value="{{isset($query)? $query : ''}}" name="query" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- conatiner -->
	</header>