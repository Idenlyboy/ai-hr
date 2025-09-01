<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?? 'ru' }}">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="author" content="t.me/Idenlyboy">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script async>
		window.sessionToken = "{{ session('token') }}";
	</script>

	<title>@yield('title')</title>

	<link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="manifest" href="/images/favicon/site.webmanifest" />

	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	@stack('styles')
	<script src="https://telegram.org/js/telegram-web-app.js"></script>
</head>