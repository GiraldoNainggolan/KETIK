<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $merchantId = Auth::guard('merchant')->id();

        $products = Product::where('merchant_id', $merchantId)
            ->when(request('search') ?? false, function ($query, $search) {
                return $query->where('name', 'LIKE', "%$search%");
            })
            ->withCount('comments')
            ->paginate(10)
            ->withQueryString();

        $totalProducts = Product::where('merchant_id', $merchantId)->count();

        return view('Merchant.Products.Index', [
            'products' => $products,
            'totalproducts' => $totalProducts,
        ]);
    }

    public function create()
    {
        return view('Merchant.Products.Tambah');
    }

    public function store(Request $request)
    {
        $merchantId = Auth::guard('merchant')->id();
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => [
                'required',
                Rule::in([
                    1,
                    2,
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    9,
                    10
                ]),
            ],
            'price' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => [
                'required',
                Rule::in(['tersedia', 'habis']),
            ],
            'photo' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'photo2' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'photo3' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],

        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo'] = $fileName;
        }

        if ($request->hasFile('photo2')) {
            $file = $request->file('photo2');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo2'] = $fileName;
        }

        if ($request->hasFile('photo3')) {
            $file = $request->file('photo3');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo3'] = $fileName;
        }

        $validated['merchant_id'] = $merchantId;

        Product::create($validated);

        Alert::success('Produk berhasil ditambahkan');
        return redirect()->route('merchant.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }



    public function edit(Product $product)
    {
        $merchantId = Auth::guard('merchant')->id();
        if ($product->merchant_id != $merchantId) {
            return redirect()->route('merchant.products.index')->with('error', 'Unauthorized access');
        }

        $category = Category::all();


        return view('Merchant.Products.Edit', [
            'product' => $product,
            'category' => $category,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $merchantId = Auth::guard('merchant')->id();
        if ($product->merchant_id != $merchantId) {
            return redirect()->route('merchant.products.index')->with('error', 'Unauthorized access');
        }

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => [
                'required',
                Rule::in([
                    // 'Electronics',
                    // 'Fashion',
                    // 'Book',
                    // 'Beauty & Health',
                    // 'Sports & Outdoors',
                    // 'Toys & Hobbies',
                    // 'Automotive',
                    // 'Books',
                    // 'Groceries',
                    // 'Office Supplies'
                    1,
                    2,
                    3,
                    4,
                    5,
                    6,
                    7,
                    8,
                    9,
                    10
                ]),
            ],
            'price' => ['required', 'numeric'],
            // 'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'status' => [
                'required',
                Rule::in(['tersedia', 'habis']),
            ],
            'photo' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'photo2' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'photo3' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'promotion_photos.*' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo'] = $fileName;
        }

        if ($request->hasFile('photo2')) {
            $file = $request->file('photo2');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo2'] = $fileName;
        }

        if ($request->hasFile('photo3')) {
            $file = $request->file('photo3');
            $fileName = 'product_photos/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['photo3'] = $fileName;
        }

        // Handle multiple promotion photos (if applicable)
        if ($request->hasFile('promotion_photos')) {
            foreach ($request->file('promotion_photos') as $photo) {
                $photoName = 'promotion_photos/' . $photo->getClientOriginalName();
                $photo->storeAs('public', $photoName);
                // Assuming you have a way to save these promotion photo names
                // You might want to save the promotion photo names in a separate table or as a JSON array in a column
            }
        }

        $product->update($validated);

        return redirect()->route('merchant.products.index')->with('success', 'Produk berhasil diperbarui.');
    }



    public function destroy(Product $product)
    {
        $product->favorites()->delete();
        $product->comments()->delete();
        $product->delete();

        return redirect()->route('merchant.products.index');
    }
}
