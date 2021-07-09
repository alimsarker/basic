<?php

use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ChangePassController;



   

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('services')->get();
    $images = Multipic::all();
    return view('home', compact('brands','abouts', 'services', 'images'));
});

//Category Route

Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
Route::get('/trachCat/edit/{id}',[CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('/category/pdelete/{id}',[CategoryController::class, 'PDelete']);

//brand Route
Route::get('/brand/all',[BrandController::class, 'AllBnd'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'AddBnd'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit']);
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);

//Multi Images Route
Route::get('/multi/image',[BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class, 'AddImg'])->name('store.image');



// Admin Home Slider All Route  

Route::get('/home/slider',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class, 'Edit']);
Route::post('/slider/update/{id}',[HomeController::class, 'Update']);
Route::get('/slider/delete/{id}',[HomeController::class, 'Delete']);

// Admin Home About All Route  

Route::get('/home/about',[HomeAboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/home_about',[HomeAboutController::class, 'AddHomeAbout'])->name('add.home_about');
Route::post('/store/home_about',[HomeAboutController::class, 'StoreHomeAbout'])->name('store.home_about');
Route::get('/homeabout/edit/{id}',[HomeAboutController::class, 'Edit']);
Route::post('/homeabout/update/{id}',[HomeAboutController::class, 'Update']);
Route::get('/homeabout/delete/{id}',[HomeAboutController::class, 'Delete']);

// Admin Service All Route 
Route::get('/home/service',[ServiceController::class, 'HomeService'])->name('home.service');
Route::get('/add/service',[ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service',[ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}',[ServiceController::class, 'Edit']);
Route::post('/service/update/{id}',[ServiceController::class, 'Update']);
Route::get('/service/delete/{id}',[ServiceController::class, 'Delete']);


// Portfolio  All Route contact
Route::get('/portfolio',[PortfolioController::class, 'PortFolio'])->name('portfolio');


// Admin Contact  All Route 
Route::get('/admin/contact',[ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/add/contact',[ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/store/contact',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}',[ContactController::class, 'Edit']);
Route::post('/contact/update/{id}',[ContactController::class, 'Update']);
Route::get('/contact/delete/{id}',[ContactController::class, 'Delete']);

// Home Contact All Route  
Route::get('/contact',[ContactController::class, 'Contact'])->name('contact');
// Home Contact Form Route  
Route::post('/contact/form',[ContactController::class, 'ContactForm'])->name('contact.form');

//  Admin Contact Message Route   
Route::get('/admin/message',[ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/message/delete/{id}',[ContactController::class, 'MessageDelete']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard',compact('users'));
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[LogoutController::class, 'Logout'])->name('user.logout');



// Change Password Route  
Route::get('/user/password',[ChangePassController::class, 'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePassController::class, 'PassUpdate'])->name('password.update');


// Profile Update Route 
Route::get('/user/profile',[ChangePassController::class, 'PUpdate'])->name('profile.update');
Route::post('/update/user/profile',[ChangePassController::class, 'UserUpdateProfile'])->name('update.user.profile');