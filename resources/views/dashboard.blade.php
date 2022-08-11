<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container my-5">
                    <div class="row">
                        <h1 class="my-2 fs-4 fw-bold text-center">Shorten Your URL Here</h1>
                        <form class="form-inline" action="{{ route('url.shorten') }}" method="POST">
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
                            <div class="alert alert-success alert-dismissible fade show shortenSuccessError" role="alert">
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
                                    <th scope="col">Visitors</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urls as $key => $item)
                                    <tr>
                                        <td>{{ $item->destination_url }}</td>
                                        <td>{{ $item->default_short_url }}</td>
                                        <td>{{ $item->visits->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
