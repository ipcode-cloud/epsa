@extends('layouts.app')
@section('content')
    <div>
        <h1>product Details</h1>
        <p>ProductId:{{$stockin->id}}</p>
        <p>ProductName:{{$stockin->product->product_name}}</p>
    </div>
@endsection