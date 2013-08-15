<!DOCTYPE html>
<html>
<head>
	<title>Attendance App</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An app to take attendance for groups">
  <meta name="author" content="Matthew Chan">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
	<div id="content">
		@yield('content')
	</div>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
  <script src="{{ asset('node_modules/underscore/underscore-min.js') }}"></script>
  <script src="{{ asset('node_modules/backbone/backbone-min.js') }}"></script>
  <script src="{{ asset('node_modules/mustache/mustache.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('scripts')
</body>
</html>