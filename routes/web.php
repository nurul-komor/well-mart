<?php

use Carbon\Carbon;
use App\Models\News;
use App\Models\Order;
use GuzzleHttp\Client;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Algolia\AlgoliaSearch\SearchClient;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\OrderPlaceController;
use App\Http\Controllers\TaskAcceptController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\MarkNotificationAsRead;
use App\Http\Controllers\NewsCategoryController;

use App\Http\Controllers\SellerProfileController;




use App\Http\Controllers\SellerProductsController;
use App\Http\Controllers\DeliveryMenStatusController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CommonController::class, 'index'])->name('home');

Route::get('/markAsRead/{id}/{url}', [MarkNotificationAsRead::class, 'markAsRead'])->name('notification.asRead');
/**------------------------------------------------------------------------
 *                           Users Routes
 *------------------------------------------------------------------------**/

Route::get('/track-orders', function () {
    $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
    return view('user.dashboard', ['orders' => $orders]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
// contact route


/* --------------------------- Products page routes start -------------------------- */
Route::group(['as' => 'common.'], function () {
    Route::get('/products', [CommonController::class, 'products'])->name('products');
    Route::get('/products/{category}', [CommonController::class, 'productsByCategory'])->name('productsByCategory');
    Route::get('/products/singleProduct/{code}', [CommonController::class, 'singleProduct'])->name('singleProduct');

    // add to cart product
    Route::post("addToCart", [AddToCartController::class, 'add'])->name('cart.add');

    /* --------------------------- News routes starts -------------------------- */

    Route::get('/news', [CommonController::class, 'news'])->name('news.index');
    Route::get('/news/{newsTitle}', [CommonController::class, 'singleNews'])->name('news.singleNews');
    /* --------------------------- News routes ends -------------------------- */
    /* --------------------------- Contact routes ends -------------------------- */
    Route::get('/contact', [CommonController::class, 'contact'])->name('contact');
    Route::post('/send-message', [CommonController::class, 'sendMessage'])->name('message.send');
    /* --------------------------- Contact routes ends -------------------------- */
    /* --------------------------- about us routes ends -------------------------- */
    Route::get('/about-us', [CommonController::class, 'about'])->name('about');
    /* --------------------------- about us routes ends -------------------------- */
});

Route::middleware(['auth', 'verified'])->group(function () {
    // cart page routes
    Route::get('/cart', [CartPageController::class, 'index'])->name('cart.index');
    Route::get('/cart/{code}', [CartPageController::class, 'removeItemFromCart'])->name('cart.removeItemFromCart');

    // retrieve cart data from session

    Route::get('/getProductsFromCart', [CartPageController::class, 'getProductsFromCart'])->name('cart.getProducts');


    Route::post('cartItemIncrement/{code}', [CartPageController::class, 'cartItemIncrement'])->name('cart.increment');
    Route::post('cartItemDecrement/{code}', [CartPageController::class, 'cartItemDecrement'])->name('cart.decrement');


    Route::post('/placeOrder', [OrderPlaceController::class, 'index'])->name('order.place');


});

/* --------------------------- Products page routes ends -------------------------- */



require __DIR__ . '/auth.php';


/**------------------------------------------------------------------------
 *                           Sellers Routes
 *------------------------------------------------------------------------**/


Route::get('/seller/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth:seller', 'isVerifiedSeller'])->name('seller.dashboard');

Route::group(['middleware' => ['auth:seller'], 'prefix' => 'seller', 'as' => 'seller.'], function () {
    Route::get('/profile', [SellerProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [SellerProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [SellerProfileController::class, 'destroy'])->name('profile.destroy');


    //=========================== seller products routes ==============================//

    Route::resource('/products', SellerProductsController::class);
});


require __DIR__ . '/seller_auth.php';
/**------------------------------------------------------------------------
 *                           Delivery Man Routes
 *------------------------------------------------------------------------**/


Route::get('/delivery_men/dashboard', function () {
    $orders = Order::where('status', 'processing')->select('id', 'address', 'status', 'products')->get();
    return view('delivery_men.dashboard', [
        'orders' => $orders
    ]);
})->middleware(['auth:delivery_men'])->name('delivery_men.dashboard');

Route::group(['middleware' => ['auth:delivery_men'], 'prefix' => 'delivery_men', 'as' => 'delivery_men.'], function () {
    // Route::get('/profile', [SellerProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [SellerProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [SellerProfileController::class, 'destroy'])->name('profile.destroy');


    //=========================== seller products routes ==============================//
    Route::get('/status', [DeliveryMenStatusController::class, 'index'])->name('status.index');
    Route::post('/changeStatus/{id}', [DeliveryMenStatusController::class, 'update'])->name('status.update');
    // accept task
    Route::get("edit_task/{orderId}", [TaskAcceptController::class, 'edit'])->name('task.edit');
    Route::post("update_task/{orderId}", [TaskAcceptController::class, 'update_task'])->name('task.update');
    // my task
    Route::get('/my_tasks', [TaskAcceptController::class, 'my_task'])->name('my_task.index');
    Route::get('/my_tasks/edit/{id}', [TaskAcceptController::class, 'edit_my_task'])->name('my_task.edit');
    Route::post('/my_task/update/{id}', [TaskAcceptController::class, 'update_my_task'])->name('my_task.update');
});


require __DIR__ . '/delivery_men_auth.php';

/**------------------------------------------------------------------------
 *                           Admins Routes
 *------------------------------------------------------------------------**/


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', ['pageTitle' => "Dashboard"]);
})->middleware(['auth:admin'])->name('admin.dashboard');

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {


    //=========================== Admin profile routes ==============================//

    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');

    //=========================== Customers routes ==============================//

    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/delete/{customer}', [CustomerController::class, 'destroy'])->name('customer.delete');

    //=========================== Seller routes ==============================//

    Route::get('/sellers', [SellerController::class, 'index'])->name('seller.index');
    Route::get('/sellers/delete/{sellers}', [SellerController::class, 'destroy'])->name('seller.delete');
    // Delivery men
    Route::resource('/delivery_men', DeliveryManController::class);

    //=========================== Product category routes ==============================//
    Route::resource('/product_categories', ProductCategoriesController::class);


    //=========================== Product routes ==============================//
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    //===========================  Product  status changer routes routes ==============================//
    Route::post('/products/changeStatus', [ProductController::class, 'changeStatus'])->name('products.changeStatus');

    // order routes

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // contact routes

    Route::get('/messages', ContactController::class)->name('contact.index');

    // news category routes

    Route::resource('/news_category', NewsCategoryController::class);
    // news routes

    Route::resource('/news', NewsController::class);

});

require __DIR__ . '/admin_auth.php';







// payment routes

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);






Route::get('/test', function () {
    return view('test');
});