@extends('layouts.app')

@section('content')
    <div>
        <h1>StockIn</h1>
        <a href="{{ route('stockin.create') }}">create</a>
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
                @foreach ($stockins as $stockin)
                    <tr>
                        <td>{{ $stockin->id }}</td>
                        <td><a href="{{route('stockin.show',$stockin->id)}}">{{ $stockin->product->product_name }}</a></td>
                        <td>{{ $stockin->date }}</td>
                        <td>{{ $stockin->quantity }}</td>
                        <td>{{ $stockin->unit_price }}</td>
                        <td>{{ $stockin->total_price }}</td>
                        <td>
                            <form action="{{ route('stockin.destroy', $stockin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{route('stockin.edit',$stockin->id)}}">update</a>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            @if ($stockins->hasPages())
                <span>Page {{ $stockins->currentPage() }} of {{ $stockins->lastPage() }}</span>
                <div class="flex justify-around mt-4 w-full">
                    @if ($stockins->onFirstPage())
                        <div>Previous</div>
                    @else
                        <a href="{{ $stockins->previousPageUrl() }}">Previous</a>
                    @endif

                    @if ($stockins->hasMorePages())
                        <a href="{{ $stockins->nextPageUrl() }}">Next</a>
                    @else
                        <div>Next</div>
                    @endif
                </div>
                
            @endif

    </div>
    </div>
@endsection