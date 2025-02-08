<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>QuizGenius</title>
        <link rel="icon" type="image/png" href="/img/ico.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script defer type="module" src="/js/auth/modal.js"></script>
		@yield('links')
	</head>
	<body>
        @if(session('error'))
            @include('/elements/error', ['error'=>session('error')])
        @endif

        <figure class="background"></figure>

        @yield('mainContent')
    </body>
</html>
