@extends('layouts.app')
@section('content')
<div class="row">
    <h1>Reports</h1>
    <h1>{{ ucfirst($filter) }} Report</h1>
    <form method="GET" action="{{ route('report.index') }}">
        <div class="form-group">
            <select name="filter" id="filter" class="form-control" onchange="this.form.submit()">
                <option value="all" selected disabled>default-Daily</option>
                <option value="daily">Daily</option>
                <option value="weekly" >Weekly</option>
            </select>
        </div>

    <h2>Stock In</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Product</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Quantity</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Unit Price</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Date</th>
        </tr>
        @foreach ($stockIns as $in)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $in->product->product_name }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $in->quantity }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $in->unit_price }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $in->date }}</td>
            </tr>
        @endforeach
    </table>

    <h2>Stock Out</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Product</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Quantity</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Date</th>
        </tr>
        @foreach ($stockOuts as $out)
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $out->product->product_name }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $out->quantity }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $out->date }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
