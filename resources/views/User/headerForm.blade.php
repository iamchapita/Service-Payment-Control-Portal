@extends('layouts.app')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
@endif
<div class="container">
    @isset($title)
    <h1>{{ $title }}</h1>
    <br>
    @endisset
    @if(isset($values))
    @foreach ($values as $value)
    <form method="POST" action="{{ route($formURL, $value->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @endforeach
        @else
        <form method="POST" action="{{ route($formURL) }}" enctype="multipart/form-data">
            @endif
            @csrf
            @include('User.userForm')
        </form>
    </form>
</div>

@endsection
