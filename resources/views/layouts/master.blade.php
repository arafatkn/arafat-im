<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>@yield('title','Arafat Islam')</title>
	<meta name="description" content="I am Arafat, Full Stack Web Developer having more than 5 years of experinece.">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/arafatkn.png">

	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/all.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/simple-line-icons.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/slick.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/animate.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/magnific-popup.css" type="text/css" media="all">
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Preloader -->
<div id="preloader">
	<div class="outer">
		<!-- Google Chrome -->
		<div class="infinityChrome">
			<div></div>
			<div></div>
			<div></div>
		</div>

		<!-- Safari and others -->
		<div class="infinity">
			<div>
				<span></span>
			</div>
			<div>
				<span></span>
			</div>
			<div>
				<span></span>
			</div>
		</div>
		<!-- Stuff -->
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
			<defs>
				<filter id="goo">
					<feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
					<feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
					<feBlend in="SourceGraphic" in2="goo" />
				</filter>
			</defs>
		</svg>
	</div>
</div>

<!-- desktop header -->
<header class="desktop-header-3 fixed-top">

    <div class="container">
	
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets/images/logo.svg" alt="Arafat" /></a> <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarNavDropdown" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#about" class="nav-link">About</a></li>
                    <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#services" class="nav-link">Services</a></li>
                    <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#experience" class="nav-link">Experience</a></li>
                    <li class="nav-item"><a href="/projects" class="nav-link">Projects</a></li>
                    <li class="nav-item"><a href="https://arafatkn.com" class="nav-link">Blog</a></li>
                    <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </nav>

    </div>

</header>

<!-- main layout -->
<main class="content-3">

    @section('content')
    @show

    <div class="spacer" data-height="96"></div>
    
    <footer class="footer">
        <div class="container">
            <span class="copyright">© 2015-{{ date('y') }} Arafat Islam</span>
        </div>
    </footer>

</main>

<!-- Go to top button -->
<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

<!-- SCRIPTS -->
<script src="/assets/js/jquery-1.12.3.min.js"></script>
<script src="/assets/js/jquery.easing.min.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/infinite-scroll.min.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/contact.js"></script>
<script src="/assets/js/validator.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/morphext.min.js"></script>
<script src="/assets/js/parallax.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/custom.js"></script>

</body>
</html>