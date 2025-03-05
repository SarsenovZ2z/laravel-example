@extends('layouts.default-layout')

@section('content')
    <p>
        Ваш tax номер: {{ $user_tax_number }} <br/>
        Товар: {{ $product->name }} <br/>
        Цена без учета налогов: {{ $product->price }} <br/>
        Цена с учетом налогов ({{ $country->name }}): {{ $cost_with_vat_tax }}
    </p>
@endsection
