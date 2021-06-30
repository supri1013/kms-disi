
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KMS-DISI | @yield('tittle') </title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
  	@stack('detail')
	<!-- /theme JS files -->

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>

<body>

	<!-- Main navbar -->
@include('layouts.header1')
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
@include('layouts.sidebar1')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->

				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

          @yield('conten')

					<!-- Footer -->
					<div class="navbar-text">
						&copy; 2021. created supri; tempalte by Limitless
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
