@extends('layouts.app')

@section('content')
    <div>
        <h1>StockIn</h1>
        <table>
            <thead>
                <th>product Id</th>
                <th>product name</th>
                <th>date</th>
                <th>quantity</th>
                <th>unit Price</th>
                <th>Total Price</th>
                <th>action</th>
            </thead>
            <tbody>
                @foreach ($stockins as $stockin)
                    <tr>
                        <td>{{ $stockin->id }}</td>
                        <td><a href="{{route('stockin.show',$stockin->product_in_id)}}">{{ $stockin->product->product_name }}</a></td>
                        <td>{{ $stockin->date }}</td>
                        <td>{{ $stockin->quantity }}</td>
                        <td>{{ $stockin->unit_price }}</td>
                        <td>{{ $stockin->total_price }}</td>
                        <td>
                            <form action="{{ route('stockin.destroy', $stockin->product_in_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{route('stockin.edit',$stockin->id)}}">update</a>
                        </td>
                    </tr>
                    
                @endforeach
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection