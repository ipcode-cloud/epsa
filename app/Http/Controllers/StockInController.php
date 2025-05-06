<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_in;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockins = Stock_in::with('product')->get();
        // dd($product_ids);
        return view('stockin.index', compact('stockins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        
        // dd($product_names);
        return view('stockin.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'product'=> 'required|exists:products,product_id',
            'quantity'=>'required|integer|min:1',
            'unit_price'=>'required|numeric|min:1',
            'total_price'=>'required|numeric|min:1',
            'date'=>'date',
        ]);
        // dd($validate);
        $product=Stock_in::create([
            'product_in_id'=>$validate['product'],
            'date'=>$validate['date'],
            'quantity'=>$validate['quantity'],
            'unit_price'=>$validate['unit_price'],
            'total_price'=>$validate['total_price']
        ]);
        // dd($product);
        if (!$product) {
            return redirect()->back()->with('fail', 'An error occurred, please try again!');
        }
        return redirect()->route('stockin.index')->with('success', 'Stock In created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Stock_in $stockin)
    {
        // dd($stockin);
        return view('stockin.show', compact('stockin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock_in $stockin)
    {
        return view('stockin.edit', compact('stockin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock_in $stockin)
    {
        $validate=$request->validate([
            'quantity'=>'required|integer|min:1',
            'unit_price'=>'required|numeric|min:1',
            'total_price'=>'required|numeric|min:1',
            'date'=>'date',
        ]);

        $stockin->update([
            'date'=>$validate['date'],
            'quantity'=>$validate['quantity'],
            'unit_price'=>$validate['unit_price'],
            'total_price'=>$validate['total_price']
        ]);
        
        if (!$stockin) {
            return redirect()->back()->with('fail', 'An error occurred, please try again!');
        }
        return redirect()->route('stockin.index')->with('success', 'Stock In updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock_in $stockin)
    {
        $stockin->delete();
        return redirect()->route('stockin.index')->with('success', 'Stock In deleted successfully!');
    }
}
