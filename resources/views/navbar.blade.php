<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ $current }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @foreach ( $views as $view )
                @if ( $view == $view )
                <li class="nav-view">
                    <a class="nav-link active" aria-current="page" href="#">{{ $view }}</a>
                </li>
                @else
                <li class="nav-view">
                    <a class="nav-link" href="{{ url( $view ) }}">{{ $view }}</a>
                </li>
                @endif
                @endforeach

                @isset( $elementsDropdown )
                <li class="nav-view dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Detalle de PaymentDetail
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ( $elementsDropdown as $element )
                        <li><a class="dropdown-item" href="#">{{ $element }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endisset

                <li class="nav-view">
                    <a class="nav-link disabled">Disabled</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
