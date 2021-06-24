<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[App\Http\Controllers\AdminController::class,'loginForm'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\AdminController::class,'store'])->name('admin.store');
});




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $user_profile = User::find(Auth::user()->id);
    return view('dashboard',compact('user_profile'));
})->name('dashboard');
//Admin Route
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('admin/logout',[App\Http\Controllers\AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[App\Http\Controllers\AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[App\Http\Controllers\AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/update',[App\Http\Controllers\AdminProfileController::class,'AdminProfileUpdate'])->name('admin.profile.update');
Route::get('admin/password/change',[App\Http\Controllers\AdminProfileController::class,'AdminPasswordChange'])->name('admin.password.change');
Route::post('admin/password/update',[App\Http\Controllers\AdminProfileController::class,'AdminPasswordUpdate'])->name('admin.password.update');
//frontend route
Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home.index');
Route::get('/logout',[App\Http\Controllers\HomeController::class,'logout'])->name('home.logout');
Route::get('/profile',[App\Http\Controllers\HomeController::class,'profile'])->name('user.profile');
Route::post('/profile/update',[App\Http\Controllers\HomeController::class,'profileUpdate'])->name('user.profile.update');
Route::get('/change/password',[App\Http\Controllers\HomeController::class,'ChangePassword'])->name('user.change.password');
Route::post('/change/password/update',[App\Http\Controllers\HomeController::class,'ChangePasswordUpdate'])->name('change.password.update');

//brand route
Route::get('brand',[App\Http\Controllers\BrandController::class,'index'])->name('brand.index');
Route::post('brand/store',[App\Http\Controllers\BrandController::class,'brandStore'])->name('brand.store');
Route::get('brand/edit/{id}',[App\Http\Controllers\BrandController::class,'brandEdit'])->name('brand.edit');
Route::post('brand/update/{id}',[App\Http\Controllers\BrandController::class,'brandUpdate'])->name('brand.update');
Route::get('brand/delete/{id}',[App\Http\Controllers\BrandController::class,'brandDelete'])->name('brand.delete');
//category route
Route::get('category',[App\Http\Controllers\CategoryController::class,'AllCategory'])->name('all.category');
Route::post('category/store',[App\Http\Controllers\CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('category/edit/{id}',[App\Http\Controllers\CategoryController::class,'CategoryEdit'])->name('category.edit');
Route::post('category/update/{id}',[App\Http\Controllers\CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class,'CategoryDelete'])->name('category.delete');
//sub category route
Route::get('subcategory',[App\Http\Controllers\SubCategoryController::class,'AllSubCategory'])->name('all.subcategory');
Route::post('subcategory/store',[App\Http\Controllers\SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('sub-category/edit/{id}',[App\Http\Controllers\SubCategoryController::class,'EditSub'])->name('edit.sub');
Route::post('sub-category/update/{id}',[App\Http\Controllers\SubCategoryController::class,'UpdateSub'])->name('update.sub');
Route::get('sub-category/delete/{id}',[App\Http\Controllers\SubCategoryController::class,'DeleteSub'])->name('delete.sub');
//sub-subcategory
Route::get('sub-subcategory',[App\Http\Controllers\SubSubCategoryController::class,'AllSubSubCategory'])->name('sub.subcategory');
Route::get('show-subcategory/{id}',[App\Http\Controllers\SubSubCategoryController::class,'ShowSubCategory'])->name('show.subcategory');
Route::post('sub-subcategory/store',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_store'])->name('sub.subcategory.store');
Route::get('sub-subcategory/edit/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_edit'])->name('sub.subcategory.edit');
Route::post('sub-subcategory/update/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_update'])->name('sub.subcategory.update');
Route::get('sub-subcategory/delete/{id}',[App\Http\Controllers\SubSubCategoryController::class,'SubSubCategory_delete'])->name('sub.subcategory.delete');
//products
Route::get('Add-product',[App\Http\Controllers\ProductController::class,'addProduct'])->name('add.product');
Route::get('show-SubSubCategory/{sub_id}',[App\Http\Controllers\SubSubCategoryController::class,'showSubSubCategory'])->name('show.subsubcategory');
Route::post('product/store',[App\Http\Controllers\ProductController::class,'storeProduct'])->name('store.product');
Route::get('manage/product',[App\Http\Controllers\ProductController::class,'manageProduct'])->name('manage.product');
Route::get('edit/product/{id}',[App\Http\Controllers\ProductController::class,'editProduct'])->name('edit.product');
Route::post('update/product/{id}',[App\Http\Controllers\ProductController::class,'updateProduct'])->name('update.product');
Route::post('update/multiImg',[App\Http\Controllers\ProductController::class,'updateMultiImg'])->name('update.multiImg');
Route::get('delete/multiImg/{id}',[App\Http\Controllers\ProductController::class,'deleteMultiImg'])->name('delete.multiImg');
Route::get('delete/product/{id}',[App\Http\Controllers\ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('active/product/{id}',[App\Http\Controllers\ProductController::class,'activeProduct'])->name('active.product');
Route::get('inactive/product/{id}',[App\Http\Controllers\ProductController::class,'inactiveProduct'])->name('inactive.product');



