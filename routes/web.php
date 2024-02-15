<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//PageController
Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/lien-he', [PageController::class, 'contact'])->name('contact');

Route::get('/dieu-khoan', [PageController::class, 'dieukhoan'])->name('dieukhoan');

Route::get('/tim-kiem', [PageController::class, 'search'])->name('search');

Route::get('/chinh-sach-bao-mat', [PageController::class, 'chinhsachbaomat'])->name('chinhsachbaomat');

Route::get('/forgot-password', [PageController::class, 'forgotpassword'])->name('forgot-password');

Route::get('/register', [PageController::class, 'register'])->name('register');

Route::get('/login', [PageController::class, 'login'])->name('login');

Route::get('/quay/{slug}', [PageController::class, 'housedetail'])->name('house-detail');

Route::get('/dichvu/{slug}', [PageController::class, 'servicedetail'])->name('service-detail');

Route::post('/register/user', [UserController::class, 'store'])->name('register-user');

Route::post('/login/user', [UserController::class, 'login'])->name('login-user');

//UserController
Route::middleware(['auth'])->group(function () {
  Route::get('/quay-dang-ki', [UserController::class, 'addedhouse'])->name('addedhouse');

  Route::get('/hop-dong', [UserController::class, 'contract'])->name('contract-user');

  Route::get('/thanh-toan/{bill}', [UserController::class, 'thanhtoan'])->name('thanhtoan');

  Route::get('/submitting', [UserController::class, 'submithouse'])->name('submithouse');

  Route::get('/dang-ki-dich-vu/{house}', [UserController::class, 'addedservices'])->name('addedservices');

  Route::post('/dang-ki-dich-vu/{house}/{service}', [UserController::class, 'addedservicesstore'])->name('addedservicesstore');

  Route::post('/dang-ki-dich-vu/{addedservice}', [UserController::class, 'addedservicedestroy'])->name('addedservicedestroy');

  Route::post('/quay-dang-ki/{house}', [UserController::class, 'addedhousestore'])->name('addedhousestore');

  Route::delete('/huy-dang-ki/{house}', [UserController::class, 'addedhousedestroy'])->name('destroy-addedhouse');

  Route::get('/profile', [UserController::class, 'profile'])->name('profile');

  Route::get('/profile/update', [UserController::class, 'profileupdate'])->name('profile-update');

  Route::post('/profile/store', [UserController::class, 'profilestore'])->name('store-profile');

  Route::get('/profile/{userdata}/change', [UserController::class, 'profilefix'])->name('fix-profile');

  Route::put('/profile/{userdata}/change', [UserController::class, 'fixprofile'])->name('fix-up-profile');
});

Route::middleware(['CheckRole'])->prefix('admin')->group(function () {
  //AdminController
  Route::get('/', [AdminController::class, 'admin'])->name('admin');

  //Quản lý tài khoản
  Route::get('/account', [AdminController::class, 'acc'])->name('acc');

  Route::get('/account/create', [AdminController::class, 'createacc'])->name('create-acc');

  Route::post('/account/store', [AdminController::class, 'storeuser'])->name('store-acc');

  Route::post('/account/{user}/giveRoleUser', [AdminController::class, 'giveRoleUser'])->name('give-role-user');

  Route::post('/account/{user}/revokeRoleUser', [AdminController::class, 'revokeRoleUser'])->name('revoke-role-user');

  Route::delete('/account/{user}/destroy', [AdminController::class, 'destroyuser'])->name('destroy-user');

  //Quản lý quầy
  Route::get('/house', [AdminController::class, 'house'])->name('house');

  Route::get('/house/create', [AdminController::class, 'createhouse'])->name('create-house');

  Route::get('/house/{house}', [AdminController::class, 'edithouse'])->name('edit-house');

  Route::put('/house/{house}', [AdminController::class, 'updatehouse'])->name('update-house');

  Route::post('/house/store', [AdminController::class, 'storehouse'])->name('store-house');

  Route::delete('/house/{house}/destroy', [AdminController::class, 'destroyhouse'])->name('destroy-house');

  //Quản lý dịch vụ
  Route::get('/service', [AdminController::class, 'service'])->name('service');

  Route::get('/service/create', [AdminController::class, 'createservice'])->name('create-service');

  Route::get('/service/{service}', [AdminController::class, 'editservice'])->name('edit-service');

  Route::put('/service/{service}', [AdminController::class, 'updateservice'])->name('update-service');

  Route::post('/service/store', [AdminController::class, 'storeservice'])->name('store-service');

  Route::delete('/service/{service}/destroy', [AdminController::class, 'destroyservice'])->name('destroy-service');

  //Quản lý đăng kí quầy của user
  Route::get('/contract', [AdminController::class, 'contractwait'])->name('contractwait');

  Route::get('/contract/view', [AdminController::class, 'contract'])->name('contract');

  Route::get('/contract/detail/{contract}', [AdminController::class, 'contractdetail'])->name('contractdetail');

  Route::get('/contract/create', [AdminController::class, 'createcontract'])->name('create-contract');

  Route::post('/contract/store', [AdminController::class, 'storecontract'])->name('store-contract');

  Route::post('/contract/{user}', [AdminController::class, 'setownerofhouse'])->name('contractwait-set-owner');

  Route::get('/contract/{user}/destroy', [AdminController::class, 'contractwaitdestroy'])->name('contractwait-destroy');

  Route::get('/contract/{user}', [AdminController::class, 'contractwaitdetail'])->name('contractwaitdetail');

  //Quản lý hóa đơn
  Route::get('/bill', [AdminController::class, 'billlist'])->name('bill-list');

  Route::get('/bill/{bill}', [AdminController::class, 'billview'])->name('view-bill');

  Route::get('/make-bill', [AdminController::class, 'bill'])->name('make-bill');

  Route::post('/make-bill/store', [AdminController::class, 'billstore'])->name('billstore');

  Route::delete('/bill/{bill}/destroy', [AdminController::class, 'billdestroy'])->name('destroy-bill');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');