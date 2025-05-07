@extends('layouts.app')
@section('content')
    <div>
        <h1>product Details</h1>
        <p>ProductId:{{$stockout->id}}</p>
        <p>ProductName:{{$stockout->product->product_name}}</p>
    </div>
@endsection