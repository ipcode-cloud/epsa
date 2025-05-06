@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Create Product</h1>
        
        <form action="{{ route('products.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
            @csrf

            <div class="mb-4">
                <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Select Product:</label>
                <input type="text" name="product_name" id="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Product Name" required>
            </div>
                
            <button type="submit">Add Product</button>
        </form>

    </div>
@endsection


        