<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        $product_habis = [];
        $product_tersedia = [];
        $carts = Cart::where('user_id', auth()->id())->get();
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            if ($product->status == 'tersedia') {
                $product_tersedia[] = [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'qty' => $cart->qty,
                    'price' => $product->price,
                    'photo' => $product->photo,
                    'merchant_id' => $product->merchant_id,

                ];
            } else {
                $product_habis[] = [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'qty' => $cart->qty,
                    'price' => $product->price,
                    'photo' => $product->photo,
                    'merchant_id' => $product->merchant_id,
                ];
            }
        }

        $grouped_products = [];
        foreach ($product_tersedia as $product) {
            $grouped_products[$product['merchant_id']]['habis'] = [];
            $merchant_id = $product['merchant_id'];
            $merchant = Merchant::where('id', $merchant_id)->first();
            $grouped_products[$product['merchant_id']]['merchant'] = $merchant;
            $grouped_products[$product['merchant_id']]['tersedia'][] = $product;
        }

        foreach ($product_habis as $product) {
            $merchant_id = $product['merchant_id'];
            $merchant = Merchant::where('id', $merchant_id)->first();
            $grouped_products[$product['merchant_id']]['merchant'] = $merchant;
            if (!isset($grouped_products[$product['merchant_id']]['tersedia'])) {
                $grouped_products[$product['merchant_id']]['tersedia'] = [];
            }
            $grouped_products[$product['merchant_id']]['habis'][] = $product;
        }
        // dd($grouped_products);
        return view('User.Pages.cart', [
            'grouped_products' => $grouped_products

        ]);
    }

    public function addToCart()
    {

        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', request('product_cart'))
            ->first();

        if ($cart) {
            $cart->update([
                'qty' => $cart->qty + request('qty_cart')
            ]);

            Alert::success('User', 'Produk telah ditambahkan ke Keranjang');
            return back();
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => request('product_cart'),
            'qty' => request('qty_cart')
        ]);

        Alert::success('User', 'Produk telah ditambahkan ke Keranjang');
        return back();
    }

    public function removeFromCart()
    {
        $id = request('cart_id');
        Cart::destroy($id);
        Alert::success('User', 'Produk telah dihapus dari Keranjang');
        return back();
    }

    public function updateCartQty()
    {
        $cart = Cart::where('id', request('cart-id'))->first();
        $cart->update([
            'qty' => request('qty')
        ]);

        return back();
    }
}
