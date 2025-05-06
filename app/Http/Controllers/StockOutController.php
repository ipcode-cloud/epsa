<?php

namespace App\Http\Controllers;

use App\Models\Stock_out;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockOuts = Stock_out::paginate(10);
        return view('stockout.index', compact('stockOuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new stock-out record
        return view('stockout.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_out_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ], [
            'product_out_id.required' => 'Product ID is required',
            'product_out_id.exists' => 'Product ID does not exist',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be at least 1',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
        ]);

        Stock_out::create($validated);

        return redirect()->back()->with('success', 'Stock-out record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock_out $stock_out)
    {
        // Show the stock-out record details
        return view('stockout.show', compact('stock_out'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock_out $stock_out)
    {
        // Show the form to edit the stock-out record
        return view('stockout.edit', compact('stock_out'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock_out $stock_out)
    {
        $validated = $request->validate([
            'product_out_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ], [
            'product_out_id.required' => 'Product ID is required',
            'product_out_id.exists' => 'Product ID does not exist',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be at least 1',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
        ]);

        $stock_out->update($validated);

        return redirect()->back()->with('success', 'Stock-out record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock_out $stock_out)
    {
        $stock_out->delete();

        return redirect()->back()->with('success', 'Stock-out record deleted successfully');
    }
}
