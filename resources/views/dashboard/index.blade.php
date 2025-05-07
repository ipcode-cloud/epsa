@extends('layouts.app')
@section('content')
    <h1>dashboard</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Stockin</h2>
                <ul>
                    @foreach ($stockins as $stockin)
                        <li><a href="{{ route('stockin.show', $stockin->id) }}">{{ $stockin->product->product_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Stockout</h2>
                <ul>
                    @foreach ($stockouts as $stockout)
                        <li><a href="{{ route('stockout.show', $stockout->id) }}">{{ $stockout->product->product_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Products</h2>
                <ul>
                    @foreach ($products as $product)
                        <li><a href="{{ route('product.show', $product->id) }}">{{ $product->product_name }}</a></li>
                    @endforeach
                </ul>
            </div>
@endsection