<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.widgets.head')
</head>
<body class="js">
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		@include('frontend.widgets.narbar')
        <!-- End Topbar -->

		<!-- Header Inner -->
		@include('frontend.widgets.menu')
		<!--/ End Header Inner -->
	</header>
    <!--/ End Header -->
    {{-- @include('frontend.system.dashboard') --}}
    @yield('content')

	<!-- Start Footer Area -->
	@include('frontend.widgets.footer')
	<!-- /End Footer Area -->

    @include('frontend.widgets.js')
</body>
</html>
