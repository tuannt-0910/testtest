<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="{{asset(mix('css/admin.css'))}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset(mix('js/admin.js'))}}"></script>
</head>

<body>
	<!-- Main navbar -->
	@include('Admin.Layouts.navbar')
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('Admin.Layouts.sidebar')
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">
				<div class="page-header mt-15 mb-15">
					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							@yield('progress_bar')
						</ul>
					</div>
				</div>

				<!-- Content area -->
				<div class="content">

					@yield('content')

					<!-- Footer -->
					@include('Admin.Layouts.footer')
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
