@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Stockin</h1>
        <p class="text-lg mb-4">This is your stockin page where you can manage your stockins</p>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Recent Stockins</h2>
            <ul class="list-disc pl-5">
                @foreach ($stockins as $stockin)
                    <li>{{ $stockin->name }} - {{ $stockin->quantity }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mt-8">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockins as $stockin)
                        <tr>
                            <td>{{ $stockin->name }}</td>
                            <td>{{ $stockin->quantity }}</td>
                            <td>{{ $stockin->created_at }}</td>
                        </tr>
                    @endforeach
            </table>