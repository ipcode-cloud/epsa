@extends('layouts.app')
@section('content')
    <h1>update Stockout</h1>
    <form action="{{ route('stockout.update',$stockout->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <input type="text" name="product" id="product" placeholder="product" value="{{ $stockout->product->product_name }}" readonly>
        @error('product')
            {{ $message }}
        @enderror
        <input type="number" name="quantity" id="quantity" placeholder="quantity" value="{{ $stockout->quantity }}">
        @error('quantity')
            {{ $message }}
        @enderror
        <input type="datetime-local" name="date" id="date" placeholder="date" value="{{ $stockout->date }}">
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
