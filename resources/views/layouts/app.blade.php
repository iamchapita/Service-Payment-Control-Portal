<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!DOCTYPE html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <script src="{{asset('js/spp.js')}}" defer></script>

        <script src="{{asset('js/filter.js')}}"></script>
        <script src="{{asset('js/clearSelect.js')}}"></script>
        <script src="{{asset('js/checkField.js')}}"></script>

        <title>Sistema de Control de Pagos</title>
    </head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{{ 'Sistema de Control de Pagos' }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @isset( $views )
                        @foreach ( $views as $view )
                        @if ( $view == $currentView )
                        <li class="nav-view">
                            <a class="nav-link active" aria-currentView="page" href="#">{{ $view }}</a>
                        </li>
                        @else
                        <li class="nav-view">
                            <a class="nav-link" href="{{ route( $view ) }}">{{ $view }}</a>
                        </li>
                        @endif
                        @endforeach
                        @endisset
                        @isset( $elementsDropdown )

                        <li class="nav-view dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Detalle de PaymentDetail
                            </a>
                            <ul class="dropdown-menu">

                                @for ($i=0; $i<3; $i++) <li><a class="dropdown-item" href="{{ route( $elementsDropdownLinks[$i] ) }}">{{ $elementsDropdown[$i] }}</a>
                        </li>
                        @endfor

                    </ul>
                    </li>
                    @endisset
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endguest
                </ul>
            </div>
    </div>
    </nav>
    <main>
        @yield('content')
    </main>
    </div>
</body>

</html>
