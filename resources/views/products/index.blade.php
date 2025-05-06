@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-100 mb-5">
        <h1 class="text-4xl font-bold mb-4">Stockin</h1>
        <p class="text-lg mb-4">This is your stockin page where you can manage your stockins</p>
        <a href="{{ route('products.create') }}">Add product</a>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Recent Products</h2>
        </div>
        <div class="mt-8">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Product Id</th>
                        <th class="py-2 px-4">Product Name</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $product->product_id }}</td>
                            <td class="py-2 px-4">{{ $product->product_name }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('products.show', $product->product_id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                                <a href="{{ route('products.edit', $product->product_id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                            </td>
                            
                        </tr>
                    @endforeach
            </table>
        </div>
    @endsection
