@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Product Details</h1>
        <div class="bg-white shadow-md rounded-lg p-6 w-1/2">
            <h2 class="text-2xl font-semibold mb-4">Product Name: {{ $product->name }}</h2>
            <p class="text-lg mb-4">Product ID: {{ $product->id }}</p>
            <p class="text-lg mb-4">Quantity: {{ $product->quantity }}</p>
        </div>
    </div>
@endsection
