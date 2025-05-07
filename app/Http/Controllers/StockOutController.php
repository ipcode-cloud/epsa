<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_out;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockouts = Stock_out::with('product')->paginate(3);
        return view('stockout.index', compact('stockouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stockouts=Product::all();
        // dd($stockouts);
        return view('stockout.create', compact('stockouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'product' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'date' => 'date',
        ]);

        $product = Stock_out::create([
            'product_id' => $validate['product'],
            'date' => $validate['date'],
            'quantity' => $validate['quantity'],
        ]);

        if (!$product) {
            return redirect()->back()->with('fail', 'An error occurred, please try again!');
        }
        return redirect()->route('stockout.index')->with('success', 'Stock Out created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock_out $stockout)
    {
        // dd($stockout);
        return view('stockout.show', compact('stockout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock_out $stockout)
    {
        // dd($stockout);
        return view('stockout.edit', compact('stockout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock_out $stockout)
    {
        $validate = $request->validate([
            'quantity' => 'required|integer|min:1',
            'date' => 'date',
        ]);

        $stockout->update([
            'quantity' => $validate['quantity'],
            'date' => $validate['date'],
        ]);

        if (!$stockout) {
            return redirect()->back()->with('fail', 'An error occurred, please try again!');
        }
        return redirect()->route('stockout.index')->with('success', 'Stock Out updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock_out $stockout)
    {
        $stockout->delete();
        if (!$stockout) {
            return redirect()->back()->with('fail', 'An error occurred, please try again!');
        }
        return redirect()->route('stockout.index')->with('success', 'Stock Out deleted successfully!');
    }
}
