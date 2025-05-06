@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Update Stockout</h1>
        <form action="{{ route('stockouts.update', $stockout->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="productout" class="block text-gray-700 text-sm font-bold mb-2">Select Product:</label>
                <select name="productout" id="productout" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" disabled>Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $stockout->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="{{ $stockout->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>
        