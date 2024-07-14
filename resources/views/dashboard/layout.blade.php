<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="{{asset('sidebar/css/style.css')}}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
		

@include('dashboard.sidebar')


        <!-- Page Content  -->
   
@yield('content')


		</div>

    <script src="{{asset('sidebar/js/jquery.min.js')}}"></script>
    <script src="{{asset('sidebar/js/popper.js')}}"></script>
    <script src="{{asset('sidebar/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sidebar/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
  </body>
</html>