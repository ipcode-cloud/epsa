@extends('layouts.app')
@section('content')
    <h1>StockOut</h1>
    <a href="{{ route('stockout.create') }}">create</a>
    @if ($msg = session('success'))
        <span>{{ $msg }}</span>
    @endif
    @if ($msg = session('fail'))
        <span>{{ $msg }}</span> 
    @endif
    <table class="table-auto w-full border-collapse border border-gray-200">
        <thead class="bg-slate-400 px-4 py-2">
            <th class="">product Id</th>
            <th>product name</th>
            <th>date</th>
            <th>quantity</th>
            <th>unit Price</th>
            <th>Total Price</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($stockouts as $stockout)
                <tr>
                    <td>{{ $stockout->id }}</td>
                    <td><a href="{{route('stockout.show',$stockout->id)}}">{{ $stockout->product->product_name }}</a></td>
                    <td>{{ $stockout->date }}</td>
                    <td>{{ $stockout->quantity }}</td>
                    <td>{{ $stockout->unit_price }}</td>
                    <td>{{ $stockout->total_price }}</td>
                    <td>
                        <form action="{{ route('stockout.destroy', $stockout->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{route('stockout.edit',$stockout->id)}}">update</a>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        @if ($stockouts->hasPages())
            <span>Page {{ $stockouts->currentPage() }} of {{ $stockouts->lastPage() }}</span>
            <div class="flex justify-around mt-4 w-full">
                @if ($stockouts->onFirstPage())
                    <div>Previous</div>
                @else
                    <a href="{{ $stockouts->previousPageUrl() }}">Previous</a>
                @endif

                @if ($stockouts->hasMorePages())
                    <a href="{{ $stockouts->nextPageUrl() }}">Next</a>
                @else
                    <div>Next</div>
                @endif
            </div>
        @endif
    </div>
@endsection