<?php
namespace App\Http\Controllers;

use App\Models\Stock_in;
use App\Models\Stock_out;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Choose between 'daily' or 'weekly' in query string
        $filter = $request->query('filter', 'daily');

        if ($filter === 'weekly') {
            $from = Carbon::now()->startOfWeek();
        } else {
            $from = Carbon::today();
        }

        $to = Carbon::now()->endOfDay();

        $stockIns = Stock_in::with('product')
            ->whereBetween('date', [$from, $to])
            ->get();

        $stockOuts = Stock_out::with('product')
            ->whereBetween('date', [$from, $to])
            ->get();

        return view('report.index', compact('stockIns', 'stockOuts', 'filter'));
    }
}
