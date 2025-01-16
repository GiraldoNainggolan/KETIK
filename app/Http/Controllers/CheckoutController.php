<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Vouchers;
use App\Models\VouchersDetail;
use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function newCheckout(Request $request)
    {
        // dd($request->all());

        if (!$request->isMethod('POST')) {
            return redirect()->route('home');
        }


        $product_id = $request->productId;
        $qty = $request->qty;
        $product_id = explode(',', $product_id[0]); // Hasil: ["25", "26"]
        $qty = explode(',', $qty[0]); // Hasil: ["3", "2"]
        $productsWithQty = [];
        foreach ($product_id as $key => $id) {
            $productsWithQty[] = [
                'id' => $id,
                'qty' => $qty[$key],
            ];
        }
        $product = Product::whereIn('id', $product_id)->get();
        $merchant = Merchant::whereIn('id', $product->pluck('merchant_id'))->get();
        foreach ($product as $key => $value) {
            if ($value->status != 'tersedia') {
                return back()->with('error', 'Produk tidak tersedia');
            }
        }
        $userId = Auth::id();



        // product to object
        $group_product = $product->groupBy('merchant_id');
        $groupedOrders = [];
        foreach ($group_product as $merchantId => $products) {
            $merchantDetails = $merchant->where('id', $merchantId)->first();
            $groupedOrders[] = [
                'merchant' => $merchantDetails,
                'products' => $products,
            ];
        }
        foreach ($groupedOrders as $groupedOrder) {
            foreach ($groupedOrder['products'] as &$product) {
                foreach ($productsWithQty as $productWithQty) {
                    if ($product->id == $productWithQty['id']) {
                        $product->qty = $productWithQty['qty'];
                    }
                }
            }
        }

        // total
        $total = 0;
        foreach ($groupedOrders as $groupedOrder) {
            foreach ($groupedOrder['products'] as $product) {
                $total += $product->price * $product->qty;
            }
        }

        // Alamat
        $alamat = Alamat::where('user_id', $userId)->get();
        // dd($alamat);



        $data = [
            'qty' => $qty,
            'total' => $total,
            'userId' => $userId,
            'pesanan' => $groupedOrders,
            'alamat' => $alamat,
        ];

        // dd($data);
        // dd($product->toArray() + $merchant->toArray());
        // dd($data);
        return view('Pages.checkout')->with($data);
    }


    public function applyVoucher(Request $request, $slug)
    {
        $voucher = Vouchers::where('code', $slug)->first();
        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher tidak ditemukan',
            ]);
        }
        $userId = Auth::id();
        $voucherDetail = VouchersDetail::where('voucher_id', $voucher->id)->where('users_id', $userId)->first();
        if ($voucherDetail) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher sudah digunakan',
            ]);
        }
        if ($voucher->expired_at < now()) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher sudah kadaluarsa',
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Voucher berhasil digunakan',
            'discount' => $voucher->discount_amount,
            'code' => $voucher->code,
        ]);
    }
}
