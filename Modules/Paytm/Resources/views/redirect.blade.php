<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<form method="post" action="{{ $url }}" id="paytm">
		@foreach ($paramList as $name => $value)
			<input type="hidden" name="{{ $name }}" value="{{ $value }}">
		@endforeach
	</form>
	<script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('Modules/Paytm/Resources/assets/js/paytm-redirect.min.js') }}"></script>
</body>
</html>