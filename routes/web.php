<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/',[Controllers\BaseController::class,'index'])->name('home');
Route::get('/cars',[Controllers\CarsController::class,'index'])->name('cars');
Route::get('/car/{id}',[Controllers\CarsController::class,'getCarWithId'])->name('car_id');
Route::get('/car',[Controllers\CarsController::class,'pagination']);
Route::get('/carfilter/filter',[Controllers\CarsController::class,'getCarsAndFilterCars'])->name('getCarFilterCar');
Route::get('/getModel/{id}',[Controllers\CarsController::class,'getModel']);
Route::middleware(['userCar'])->group(function (){
    Route::get('/service',[Controllers\ServicingController::class,'index'])->name('service');
    Route::get('/servicepanel',[Controllers\ServicingController::class,'servicePanelIndex'])->name('service-panel');
    Route::get('/servicepanel/choose',[Controllers\ServicingController::class,'getPanelIndex']);
    Route::get('/invoice',[Controllers\ServicingController::class,'invoice'])->name('invoice');
    Route::post('/insert_services',[Controllers\ServicingController::class,'insert_services'])->name('insert_services');
});
Route::middleware(['loggedUser'])->group(function (){
    Route::get('/login',[Controllers\UserController::class,'loginPage'])->name('login');
    Route::post("/login",[Controllers\UserController::class,'login'])->name('login.login');
    Route::get('/register',[Controllers\UserController::class,'RegisterPage'])->name('register');
    Route::post('/register',[Controllers\UserController::class,'register'])->name('register.register');
    Route::get('/forgetPassword',[Controllers\UserController::class,'reset_password_index'])->name('reset_password');
    Route::post('/forgetPasswordNext',[Controllers\UserController::class,'user_for_reset'])->name('reset_password_next');
    Route::post('/check_code',[Controllers\UserController::class,'user_check_code'])->name('user_check_code');
    Route::post('/resetPassword',[Controllers\UserController::class,'user_update_password'])->name('reset_password_finish');
});
Route::middleware(['nonLoggedUser'])->group(function (){
    Route::get('/user/{id}',[Controllers\UserController::class,'prikaz_single_page'])->name('user');
    Route::get('/logout',[Controllers\UserController::class,'logout'])->name('logout');
    Route::post('/userUpdate',[Controllers\UserController::class,'editProfile'])->name('edit');
    Route::get('/order/{car_id}/{user_id}',[Controllers\OrderController::class,'order_index'])->name('order.page');
});
Route::get('/contact',[Controllers\ContactController::class,'index'])->name('contact');
Route::post('/contact/store',[Controllers\ContactController::class,'store'])->name('checkMessage');


Route::post('/favourites',[Controllers\ArchivedSearchesController::class,'archive_insert'])->name('archive_insert');
Route::delete('/favourites',[Controllers\ArchivedSearchesController::class,'archive_delete'])->name('archive_delete');



Route::get('/single',[Controllers\SinglePageController::class,'index'])->name('single');
Route::get('/userRating',[Controllers\UserRatingController::class,'user_rating'])->name('user_rating');
Route::get('/userRatingLoad',[Controllers\UserRatingController::class,'user_rating_load'])->name('user_rating_load');
Route::get('/author',[Controllers\AuthorController::class,'index'])->name('author');
Route::post('/unos/uneti',[Controllers\CarsController::class,'unos'])->name('uneti');

Route::post("/order",[Controllers\OrderController::class,'order_store'])->name('order_store');
Route::get('/commentsAll',[Controllers\CommentsController::class,'prikaz_komentara'])->name('all_coment');
Route::post('/commentsAll',[Controllers\CommentsController::class,'unos_komentara'])->name('create_comment');
Route::get("/commentslikesupdate",[Controllers\CommentsUsersLikesController::class,'update_like'])->name('comments_likes');



                                //Admin Panel
///////////////////////////////////////////////////////////////////////////////////////////////////
///
Route::middleware(['admin'])->group(function (){
    Route::get('/admin',[Controllers\AdminHomeController::class,'index'])->name('adminPanel');
    Route::get('/admin/log',[Controllers\AdminHomeController::class,'sort_filter'])->name('sortFilter');
    Route::resource('/fuels',Controllers\AdminFuelResource::class);
    Route::resource('/users',Controllers\AdminUserController::class);
    Route::resource('/brands',Controllers\AdminBrandsController::class);
    Route::resource('/car_body',Controllers\AdminCarBodyController::class);
    Route::resource('/colors',Controllers\AdminColorController::class);
    Route::resource('/vehicles',Controllers\AdminVehicleController::class);
    Route::resource('/car_price',Controllers\AdminVehiclePriceController::class);
    Route::resource('/roles',Controllers\AdminRoleController::class);
    Route::resource('/orders_status',Controllers\AdminOrderStatusController::class);
    Route::resource('/service_packs',Controllers\AdminServicePackController::class);
    Route::resource('/services',Controllers\AdminServiceController::class);
    Route::resource('/orders',Controllers\AdminServiceController::class);
    Route::resource('/servicing',Controllers\AdminServiceController::class);
    Route::resource('/user_ratings',Controllers\AdminServiceController::class);
    Route::resource('/models',Controllers\AdminModelResource::class);
    Route::resource('/comments',Controllers\AdminCommentController::class);
});

