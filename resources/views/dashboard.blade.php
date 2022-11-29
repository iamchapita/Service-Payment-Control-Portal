@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @isset($views)
        @foreach($views as $view)
            @if($view != 'Dashboard')
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $view }}</h5>
                            <p class="card-text">Administre la informacion de {{ $view }} almacenada.</p>
                            <a href="{{ route( $view ) }}" class="btn btn-dark">{{ $view }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @endisset
    </div>
</div>
</div>
@endsection
