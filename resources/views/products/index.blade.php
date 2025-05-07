@extends('layouts.app')
@section('content')
<div>
    <h1>Products</h1>
    <a href="{{route('products.create')}}">create</a>
    <table>
        <thead>
            <th>Product Id</th>
            <th>Product Name</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->product_name}}</td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@endsection