<?php

namespace App\Http\Controllers;

use App\Models\Stock_in;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockIns = Stock_in::paginate(10);
        return view('stockin.index', compact('stockIns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new stock-in record
        return view('stockin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ], [
            'product_id.required' => 'Product ID is required',
            'product_id.exists' => 'Product ID does not exist',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be at least 1',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
        ]);

        Stock_in::create($validated);

        return redirect()->back()->with('success', 'Stock-in record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock_in $stock_in)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock_in $stock_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock_in $stock_in)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock_in $stock_in)
    {
        //
    }
}
