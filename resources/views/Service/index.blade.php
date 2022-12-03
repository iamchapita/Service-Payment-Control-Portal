@extends('layouts.app')
@section('content')
<div class='container'>
    @include('filterAndButton')
    <div class="table-responsive">
        <table class="table table-bordered table-ligth table-hover  align-middle" id="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                </tr>
            </thead>

            <tbody>
                @foreach ( $values as $value )
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->texName }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
