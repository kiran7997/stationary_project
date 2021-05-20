<?php

namespace App\Http\Controllers;

use Auth;
use App\Stocks;
use Illuminate\Http\Request;

class StockController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:stock');
    }

    public function index()
    {
        $stocks = stocks::where(['deleted' => 0])->get();

        return view('stock', compact('stocks'));
    }
    public function store(Request $req)
    {
        $stock = new Stocks();
        $req->validate([
            'product_id' => 'required',
            'item_quantity' => 'required',

        ]);

        $stock->product_id = $req->product_id;
        $stock->item_quantity = $req->item_quantity;
        $stock['created_by'] = Auth::user()->id;
        $stock['updated_by'] = Auth::user()->id;

        $stock->save();
        return response()->json($stock);
    }
    public function edit($stock_id)
    {
        $stock = Stocks::find($stock_id);
        return response()->json($stock);
    }
    public function update(Request $req)
    {
        $stock = Stocks::find($req->stock_id);
        $stock->product_id = $req->product_id;
        $stock->item_quantity = $req->item_quantity;
        $stock['updated_by'] = Auth::user()->id;
        $stock->save();
        return response()->json($stock);
    }
    public function destroy($stock_id)
    {
        $stock = Stocks::where('stock_id', $stock_id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has Been Deleted']);
    }


    // public function index()
    // {
    //     // echo "data";
    //     // exit;
    //      $stocks = Stocks::where('deleted', 0)->latest()->paginate(10);
    //     return view('stock.index', ["stocks" => $stocks]);
    // }

    // public function create()
    // {
    //     return view('stock.create');
    // }

    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'product_id' => 'required',
    //         'item_quantity' => 'required',
    //     ]);

    //     department::create($request->all());

    //     return redirect()->route('stock.index')
    //         ->with('success', 'Stocks created successfully.');
    // }

    // public function show(department $department)
    // {
    //     return view('stock.show', compact('stock'));
    // }

    // public function edit(department $department)
    // {
    //     return view('stock.edit', compact('stock'));
    // }

    // public function update(Request $request, department $department)
    // {
    //     request()->validate([
    //         'product_id' => 'required',
    //         'item_quantity' => 'required',
    //     ]);

    //     $department->update($request->all());

    //     return redirect()->route('stock.index')
    //         ->with('success', 'Stocks updated successfully');
    // }

    // public function destroy(Stocks $stock)
    // {
    //     $stock->deleted = 1;
    //     $stock->update();
    //     return redirect()->route('stock.index')
    //         ->with('success', 'Stocks deleted successfully');
    // }

}
