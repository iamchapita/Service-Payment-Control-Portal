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
        <form class="row g-3 align-items-center" method="POST" action="{{ route($formURL) }}" enctype="multipart/form-data">
            @endif
            @csrf
            @include('PaymentDetail.paymentDetailForm')

            @isset($numRegisters)
            <div class="col-6">
                <div class="input-group">
                    <label class="input-group-text" for="registerInput">Registros a Insertar</label>
                    <select class="form-select" name="numRegisters" id="numRegisters" autocomplete="off"
                    onchange="addForms()">
                        <option selected value="1">Seleccione un valor</option>
                        @for ($i = 2; $i <= $numRegisters; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
            </div>
            @endisset

            <div class="col-md-12">
                <button type="submit" class="submitButton btn btn-dark">{{ $action }}</button>
            </div>
        </form>
</div>

@endsection
