@include('navbar')
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
