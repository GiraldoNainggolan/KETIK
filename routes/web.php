<?php

use App\Models\ContactUs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GlobalChatController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\FormRegisterController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\KomentarController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\PostinganController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\RegisterMerchantController;
use App\Http\Controllers\Merchant\MerchantIndexController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Merchant\CommentController as MerchantCommentController;
use App\Http\Controllers\Merchant\ProfileController as MerchantProfileController;

require __DIR__ . '/checkout_group.php';



// Route untuk membersihkan cache
// Route::get('cache-clear', function () {
//     Artisan::call('optimize:clear');
//     // request()->session()->with('success', 'Successfully cache cleared.');
//     return redirect()->back();
// })->name('cache.clear');


// Home route
Route::get('/', [HomeController::class, 'home'])->name('home');

// Route untuk produk dan merchant
Route::get('/postingan', [HomeController::class, 'productGrids'])->name('post-product');
Route::post('/postingan', [FavouriteController::class, 'addToWishlist'])->name('add-fav');
Route::get('/postingan/detail/{slug}', [HomeController::class, 'productDetail'])->name('post-product-detail');
Route::post('/add-to-favourites', [HomeController::class, 'addToFavourites'])->name('add-to-favourites');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth:user')->name('comments.store');
Route::get('/merchant-list', [HomeController::class, 'merchantGrids'])->name('merch-list');
Route::get('/merchant/detail/{slug}', [HomeController::class, 'merchantDetail'])->name('merch-info');

// Route untuk alamat
Route::get('provinces', [AlamatController::class, 'provinces'])->name('provinces');
Route::get('cities', [AlamatController::class, 'cities'])->name('cities');
Route::get('districts', [AlamatController::class, 'districts'])->name('districts');
Route::get('villages', [AlamatController::class, 'villages'])->name('villages');

Route::get('/layanan', function () {
    return view('User.Pages.Layanan.layananpelangganindex');
})->name('layanan');
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');


// Route untuk user login
Route::middleware('guest:user,merchant')->group(function () {
    Route::get('/register', function () {
        return view('Auth.Register');
    })->name('register');
    Route::get('/login', [LoginUserController::class, 'index'])->name('login');
    Route::post('/login', [LoginUserController::class, 'login_users']);
});

// Route untuk user logout
Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');

// Route untuk admin login
Route::middleware('guest:admin')->group(function () {
    Route::get('/login-admin', [LoginAdminController::class, 'index'])->name('login-admin');
    Route::post('/login-admin', [LoginAdminController::class, 'login_admin'])->name('submit-admin');
});

// Route untuk admin logout
Route::get('/logout-admin', [LoginAdminController::class, 'logout'])->name('logout-admin');

// Route untuk register merchant
Route::middleware('guest')->group(function () {
    Route::get('/register-merchant', [RegisterMerchantController::class, 'index'])->name('register-merchant');
    Route::post('/register-merchant', [RegisterMerchantController::class, 'register_merchants'])->name('submit-reg-merchant');
});

// Route untuk register user
Route::middleware('guest')->group(function () {
    Route::get('/register-user', [RegisterUserController::class, 'index'])->name('register-user');
    Route::post('/register-user', [RegisterUserController::class, 'register_user'])->name('submit-reg-user');
});

// Route untuk contact
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

// Rute untuk User
// Rute untuk User dan Merchant
Route::middleware(['auth:user'])->group(function () {
    Route::get('/global-chat', [GlobalChatController::class, 'index'])->name('global');
    Route::post('/chat/store', [GlobalChatController::class, 'store'])->name('chat.store');
});

Route::middleware(['auth:merchant'])->group(function () {
    Route::get('/merchant-chat', [GlobalChatController::class, 'index'])->name('merchant.global');
    Route::post('/merchant-chat/store', [GlobalChatController::class, 'storeMerchant'])->name('merchant.chat.store');
});

// Route untuk user
Route::prefix('user')->middleware('auth:user')->name('user.')->group(function () {
    Route::get('/', [ProfileController::class, 'showProfile'])->name('index');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('update');
    Route::get('/fav', [FavouriteController::class, 'index'])->name('fav');
    Route::post('/fav/delete', [FavouriteController::class, 'removeFromWishlist'])->name('remove.from.wishlist');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/cart/delete', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/cart/update/qty', [CartController::class, 'updateCartQty'])->name('update.cart.qty');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/password-update', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('user/photo/update', [ProfileController::class, 'updatePhoto'])->name('photo.update');
    Route::delete('user/photo/delete', [ProfileController::class, 'deletePhoto'])->name('photo.delete');
});

// Route untuk merchant
Route::prefix('merchant')->middleware('auth:merchant')->name('merchant.')->group(function () {
    Route::get('/', [MerchantIndexController::class, 'index'])->name('index');
    Route::get('/preview/{slug}', [MerchantIndexController::class, 'merchantDetail'])->name('preview');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });



    Route::prefix('coment')
        ->name('coment.')
        ->group(function () {
            Route::get('/', [MerchantCommentController::class, 'index'])->name('index');
            Route::delete('/{comment}', [MerchantCommentController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('edit_profile')
        ->name('edit_profile.')
        ->group(function () {
            Route::get('/', [MerchantProfileController::class, 'index'])->name('index');
            Route::put('/', [MerchantProfileController::class, 'update'])->name('update');
        });

    Route::post('/password-update', [MerchantIndexController::class, 'updatePassword'])->name('password.update');
    Route::get('/{id}/edit-location', [MerchantIndexController::class, 'showLocationForm'])->name('location');
    Route::post('/{id}/update-location', [MerchantIndexController::class, 'storeLocation'])->name('storeLocation');
});

// Route untuk admin
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/', AdminHomeController::class)->name('index');

    Route::get('/change_password', function () {
        return view('Admin.change_password');
    })->name('changepassword');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}/change-password', [UserController::class, 'updatePassword'])->name('update-password');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('coment')
        ->name('coment.')
        ->group(function () {
            Route::get('/', function () {
                return view('Admin.coment.index');
            })->name('index');
        });

    Route::prefix('merchants')->name('merchants.')->group(function () {
        Route::get('/', [MerchantController::class, 'index'])->name('index');
        Route::get('/{merchant}/edit', [MerchantController::class, 'edit'])->name('edit');
        Route::put('/{merchant}/change-password', [MerchantController::class, 'updatePassword'])->name('update-password');
        Route::delete('/{merchant}', [MerchantController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [PostinganController::class, 'index'])->name('index');
        Route::get('/postingan-detail/{slug}', [HomeController::class, 'productDetail'])->name('post-product-detail');
        Route::delete('/{product}', [PostinganController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('global-chat')->name('global-chat.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::delete('/{chat}', [ChatController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('komentar')->name('komentar.')->group(function () {
        Route::get('/', [KomentarController::class, 'index'])->name('index');
        Route::delete('/{comment}', [KomentarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactUsController::class, 'index_admin'])->name('index');
        Route::delete('/{contact}', [ContactUsController::class, 'destroy'])->name('destroy');
    });
});



Route::get('/soon', [HomeController::class, 'soon'])->name('soon');
