@extends('layouts.app')
@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors -> all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
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
            @include('PaymentDetail.paymentDetailForm')
        </form>
</div>

@endsection
