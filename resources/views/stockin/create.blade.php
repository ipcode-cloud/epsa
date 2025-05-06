@extends('layouts.app')
@section('content')
    <h1>Create StockIn</h1>
    <form action="{{ route('stockin.store') }}" method="POST">
        @csrf
        <select name="product" id="product">
            <option value="" selected disabled>select product</option>
            @foreach ($products as $product)
                <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
        @error('product')
            {{ $message }}
        @enderror
        <input type="number" name="quantity" id="quantity" placeholder="quantity">
        @error('quantity')
            {{ $message }}
        @enderror
        <input type="number" name="unit_price" id="unit_price" placeholder="unit_price">
        @error('unit_price')
            {{ $message }}
        @enderror
        <input type="number" name="total_price" id="total_price" placeholder="total_price">
        @error('total_price')
            {{ $message }}
        @enderror
        <input type="datetime-local" name="date" id="date" placeholder="date">
        @error('date')
            {{ $message }}
        @enderror
        <button type="submit">add Stockin</button>
    </form>
    @if ($msg = session('fail'))
        {
        <span>{{ $msg }}</span>
        }
    @endif
@endsection
