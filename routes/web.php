<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//front page routes//
Route::get('/shop', [\App\Http\Controllers\FrontController::class, 'viewshop']);
Route::get('/about', [\App\Http\Controllers\FrontController::class, 'viewabout']);
Route::get('/oction', [\App\Http\Controllers\FrontController::class, 'oction']);
Route::get('/productdetails/{id}', [\App\Http\Controllers\FrontController::class, 'Productdetails']);
Route::post('/usersignup', [\App\Http\Controllers\UserController::class, 'UserSignup']);
Route::post('/usersignin', [\App\Http\Controllers\UserController::class, 'usersignin']);
Route::get('/usersignout', [\App\Http\Controllers\UserController::class, 'usersignout']);
Route::get('/catagorydetail/{id}', [\App\Http\Controllers\CatagoryController::class, 'viewCatagoryDetail']);
Route::get('/home', [\App\Http\Controllers\FrontController::class, 'index']);
Route::get('/', [\App\Http\Controllers\FrontController::class, 'index']);

//                      user    routes after signin             //
Route::middleware(['userauth'])->group(function () {

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'name' => 'user.',
    ], function () {
        Route::get('/cart', [\App\Http\Controllers\CartController::class, 'viewcart']);
        Route::get('/order', [\App\Http\Controllers\OrderController::class, 'vieworderpage']);

        Route::post('addtocart', [\App\Http\Controllers\CartController::class, 'addtocart']);
        Route::post('/makeorder', [\App\Http\Controllers\OrderController::class, 'makeorder']);
        Route::post('/openbid', [\App\Http\Controllers\OctionController::class, 'openBid']);
        Route::get('/contactwithseller/{id}', [\App\Http\Controllers\MessageController::class, 'viewsendMessageToSeller']);
        Route::post('/sendmessagetoseller', [\App\Http\Controllers\MessageController::class, 'sendMessagetoSeller']);

    });
});
// seller auth //
Route::post('/sellersignup', [\App\Http\Controllers\SellerController::class, 'sellersignup']);
Route::post('/sellersignin', [\App\Http\Controllers\SellerController::class, 'sellersignin']);
Route::get('/sellersignout', [\App\Http\Controllers\SellerController::class, 'logout']);

//                      seller    routes after signin             //
Route::middleware(['sellerauth'])->group(function () {

    Route::group([
        'prefix' => 'seller',
        'as' => 'seller.',
        'name' => 'seller.',
    ], function () {
        Route::get('/index', [\App\Http\Controllers\SellerController::class, 'index']);
        Route::post('/addproduct', [\App\Http\Controllers\ProductController::class, 'addproduct']);
        Route::post('/editproduct', [\App\Http\Controllers\ProductController::class, 'editProduct']);
        Route::get('/viewallproduct', [\App\Http\Controllers\SellerController::class, 'viewallproduct']);

        Route::get('/productdelete/{id}', [\App\Http\Controllers\ProductController::class, 'deleteproduct']);

        // order view routes
        Route::get('/viewallorders', [\App\Http\Controllers\OrderController::class, 'viewallorderseller']);
        Route::get('/viewactiveorders', [\App\Http\Controllers\OrderController::class, 'viewallcompletedorder']);
        Route::get('/viewcanceledorders', [\App\Http\Controllers\OrderController::class, 'viewallcanceldorder']);
        Route::post('/changeorderstatus', [\App\Http\Controllers\OrderController::class, 'changeorderstatus']);
        // customer
        Route::get('/viewallcustomer', [\App\Http\Controllers\CustomerController::class, 'viewallcustomerforseller']);

        Route::get('/octionpageload', [\App\Http\Controllers\OctionController::class, 'octionpageload']);
        Route::post('/saveoction', [\App\Http\Controllers\OctionController::class, 'saveOction']);
        Route::get('/activbids', [\App\Http\Controllers\OctionController::class, 'activBids']);
        Route::get('/closeauction/{id}', [\App\Http\Controllers\OctionController::class, 'closeAuction']);
        Route::get('/sendmessagetobuyer/{id}', [\App\Http\Controllers\MessageController::class, 'sendMessageToBuyerPageLoad']);
        Route::post('/sendmessagetobuyer', [\App\Http\Controllers\MessageController::class, 'sendMessagetoBuyer']);

    });
});


// admin routes

Route::get('/adminlogin', [\App\Http\Controllers\AdminController::class, 'adminloginpageload']);
Route::post('/adminsignin', [\App\Http\Controllers\AdminController::class, 'adminsignin']);

//                      admin    routes after signin             //
Route::middleware(['adminauth'])->group(function () {

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'name' => 'admin.',
    ], function () {
        Route::get('/index', [\App\Http\Controllers\AdminController::class, 'index']);
        Route::post('/addcatagory', [\App\Http\Controllers\CatagoryController::class, 'addcatagory']);
        Route::get('/viewallcatagaries', [\App\Http\Controllers\CatagoryController::class, 'viewallcatagaries']);
        Route::get('/catagorydelete/{id}', [\App\Http\Controllers\CatagoryController::class, 'catagorydelete']);
        Route::get('/viewallorders', [\App\Http\Controllers\OrderController::class, 'viewallordersellerforadmin']);
        Route::get('/viewactiveorders', [\App\Http\Controllers\OrderController::class, 'viewallcompletedorderforadmin']);
        Route::get('/viewcanceledorders', [\App\Http\Controllers\OrderController::class, 'viewallcanceldorderforadmin']);
        Route::get('/viewallcustomer', [\App\Http\Controllers\CustomerController::class, 'viewallcustomerforadmin']);
        Route::get('/viewallseller', [\App\Http\Controllers\SellerController::class, 'viewallsellerforadmin']);
        Route::post('/changecustomerstatus', [\App\Http\Controllers\CustomerController::class, 'changecustomerstatus']);
        Route::post('/changesellerstatus', [\App\Http\Controllers\SellerController::class, 'changesellerstatus']);


    });
});
