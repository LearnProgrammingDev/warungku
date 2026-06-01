<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $tableNumber = $request->query('meja');
        if ($tableNumber) {
            Session::put('tableNumber', $tableNumber);
        }
        $items = Item::where('is_active', 1)->orderBy('name', 'asc')->paginate(9);
        return view('customer.menu', compact('items', 'tableNumber'));
    }

    public function cart()
    {
        $cart = Session::get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:items,id'
        ]);

        $menuId = $request->input('id');
        $menu = Item::find($menuId);

        $cart = Session::get('cart', []);

        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] += 1;
        } else {
            $cart[$menuId] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->img,
                'qty' => 1
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil ditambahkan ke keranjang!',
            'data' => $cart
        ]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'itemId' => 'required|integer',
            'qty' => 'required|integer|min:1'
        ]);

        $itemId = $request->input('itemId');
        $newQty = $request->input('qty');

        $cart = Session::get('cart', []);
        if (isset($cart[$itemId])) {
            $cart[$itemId]['qty'] = $newQty;
            Session::put('cart', $cart);
            Session::flash('success', 'Jumlah item berhasil diperbarui!');
            
            return response()->json(['status' => 'success']);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item tidak ditemukan di keranjang.'
        ], 404);
    }
    
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'itemId' => 'required|integer'
        ]);

        $itemId = $request->input('itemId');

        $cart = Session::get('cart', []);
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            Session::put('cart', $cart);

            Session::flash('success', 'Item berhasil dihapus dari keranjang!');
            return response()->json(['status' => 'success']);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Item tidak ditemukan di keranjang.'
        ], 404);
    }
}
