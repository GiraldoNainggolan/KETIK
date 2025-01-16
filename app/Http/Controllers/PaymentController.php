<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Exception;
use App\Models\Transaksi;
use App\Models\Alamat;
use App\Models\Product;
use App\Models\DetailTransaksi;
use App\Models\Vouchers;
use App\Models\VouchersDetail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function newPayment(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                // 'phone' => $user->phone,
            ],
        ];


        // group order and qty
        $product_id = request('product');
        $qty = request('qty');
        $productsWithQty = [];
        foreach ($product_id as $key => $id) {
            $productsWithQty[] = [
                'id' => $id,
                'qty' => $qty[$key],
            ];
        }


        $snapToken = Snap::getSnapToken($params);
        $alamat = Alamat::where('user_id', Auth::user()->id)->first();
        $transaksi = [
            'transaksi_id' => $params['transaction_details']['order_id'],
            'user_id' => $user->id,
            'alamat_lengkap' => $alamat->alamat_lengkap,
            'provinsi' => $alamat->provinsi,
            'kabupaten' => $alamat->kabupaten,
            'kecamatan' => $alamat->kecamatan,
            'kelurahan' => $alamat->kelurahan,
            'kode_pos' => $alamat->kode_pos,
            'voucher' => $request->voucher,
            'total' =>  $request->total,
            'status' => 'menunggu pembayaran',
            'snap_token' => $snapToken, // This will be updated after getting the snap token
        ];
        // Save transaction to database
        $voucherId = Vouchers::where('code', $request->voucher)->first();
        if ($voucherId) {
            $voucherUsed = [
                'voucher_id' => $voucherId->id,
                'users_id' => $user->id,
                'used_at' => now(),
            ];
            VouchersDetail::create($voucherUsed);
        }

        Transaksi::create($transaksi);

        $id_transaksi = Transaksi::where('transaksi_id', $params['transaction_details']['order_id'])->first();
        foreach ($productsWithQty as $productWithQty) {
            $product = Product::where('id', $productWithQty['id'])->first();
            $detail_transaksi = [
                'transaksi_id' => $id_transaksi->id,
                'product_id' => $product->id,
                'qty' => $productWithQty['qty'],
                'price' => $product->price,
                'total' => $product->price * $productWithQty['qty'],
            ];

            // Save detail transaction to database
            DetailTransaksi::create($detail_transaksi);
        }


        return redirect()->route('payment-page', ['snapToken' => $snapToken])->with('params', $params);
    }

    public function paymentPage(Request $request)
    {
        $transaksi = Transaksi::where('snap_token', $request->snapToken)->first();
        // dd($request->all());
        $expired = date('Y-m-d H:i:s', strtotime('+24 hours', strtotime($transaksi->created_at)));
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        return view('Pages.payment')->with('snapToken', $request->snapToken)->with('transaksi', $transaksi)->with('expired', $expired);
    }

    public function paySuccess(Request $request)
    {
        $transaksi = Transaksi::where('snap_token', $request->snapToken)->first();
        $transaksi->status = 'di proses';
        $transaksi->save();
        if ($transaksi) {
            return response()->json([
                'message' => 'Pembayaran berhasil',
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'Pembayaran Gagal',
                'success' => false
            ]);
        }
    }
}
