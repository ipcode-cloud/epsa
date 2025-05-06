@extends('layouts.app')
@section('content')
    <h1>update StockIn</h1>
    <form action="{{ route('stockin.update',$stockin->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <input type="text" name="product" id="product" placeholder="product" value="{{ $stockin->product->product_name }}" readonly>
        @error('product')
            {{ $message }}
        @enderror
        <input type="number" name="quantity" id="quantity" placeholder="quantity" value="{{ $stockin->quantity }}">
        @error('quantity')
            {{ $message }}
        @enderror
        <input type="number" name="unit_price" id="unit_price" placeholder="unit_price" value="{{ $stockin->unit_price }}">
        @error('unit_price')
            {{ $message }}
        @enderror
        <input type="number" name="total_price" id="total_price" placeholder="total_price" value="{{ $stockin->total_price }}">
        @error('total_price')
            {{ $message }}
        @enderror
        <input type="datetime-local" name="date" id="date" placeholder="date" value="{{ $stockin->date }}">
        @error('date')
            {{ $message }}
        @enderror
        <button type="submit">update Stockin</button>
    </form>
    @if ($msg = session('fail'))
        {
        <span>{{ $msg }}</span>
        }
    @endif
@endsection
