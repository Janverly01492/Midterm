<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('items.product')->get();
        return view('sales.index', compact('sales'));
    }
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $quantity = $request->quantity;
        $subtotal = $product->price * $quantity;

        $sale = Sale::create(['total' => $subtotal]);

        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'subtotal' => $subtotal
        ]);

        // reduce stock
        $product->decrement('stock', $quantity);

        return redirect()->route('sales.show', $sale);
    }

    public function show(Sale $sale)
    {
        $sale->load('items.product');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $sale->load('items.product');
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        // For simplicity, only allow updating total (not items)
        $sale->update($request->validate([
            'total' => 'required|numeric',
        ]));
        return redirect()->route('sales.show', $sale);
    }

    public function destroy(Sale $sale)
    {
        $sale->items()->delete();
        $sale->delete();
        return redirect()->route('sales.create');
    }
}
