<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @endauth
            </div>
        @endif



    <div class="py-12 my-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container my-5">
                    <div class="row">
                        <h1 class="my-2 fs-4 fw-bold text-center">Shorten Your URL Here</h1>
                        <form class="form-inline" action="{{ route('urlshorten') }}" method="POST">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input type="text" name="url" class="form-control" placeholder="URL Shortener">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 shortenBtn">Shorten</button>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger shortenSuccessError">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shortenSuccessError"
                                role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Original URL</th>
                                    <th scope="col">Short URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urls as $key => $item)
                                    <tr>
                                        <td>{{ $item->destination_url }}</td>
                                        <td>{{ $item->default_short_url }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
