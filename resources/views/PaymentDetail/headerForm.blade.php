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
    <form method="POST" class="row g-3 align-items-center" action="{{ route($formURL, $value->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @endforeach
        @else
        <form method="POST" class="row g-3 align-items-center" action="{{ route($formURL) }}" enctype="multipart/form-data">
            @endif
            @csrf
            @include('PaymentDetail.paymentDetailForm')
            @isset($inputsName)
            <input type="hidden" name="rows" value="{{ $inputsName }}">
            @endisset
            <div class="col-md-10">
                <button type="reset" class="submitButton btn btn-secondary" onclick="disableDepositDateInput()">Limpiar</button>
            </div>
            <div class="col-md-2">
                <button type="submit" class="submitButton btn btn-dark">{{ $action }}</button>
            </div>
        </form>
</div>

@endsection
