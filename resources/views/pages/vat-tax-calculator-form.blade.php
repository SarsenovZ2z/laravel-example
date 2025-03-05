@extends('layouts.default-layout')

@push('styles')
    {{-- TODO: так делать нельзя) --}}
    <style>
        form {
            display: grid;
            gap: 12px;
            max-width: 320px;
            padding: 24px;
            margin: 40px auto;
            border: 1px solid gray;
            border-radius: 8px;
        }
        label {
            display: flex;
            justify-content: space-between;
        }
        input, select, button {
            padding: 6px 16px;
        }
        .error {
            color: red;
            margin: 8px 0;
        }
    </style>
@endpush

@section('content')
    <form action="{{ route('calculate-vat-tax') }}" method="POST">
        @csrf

        <div>
            <label>
                Tax номер:
                <input type="text" name="tax_number" placeholder="Введите ваш tax номер"/>
            </label>
            @foreach($errors->get('tax_number') as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        </div>

        <div>
            <label>
                Продукт:
                <select name="product_id" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </label>
            @foreach($errors->get('product_id') as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        </div>

        <button type="submit">Рассчитать</button>
    </form>
@endsection
