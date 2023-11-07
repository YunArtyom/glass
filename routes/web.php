<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReelController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Route::get('authentication', [AuthorizationController::class, 'authenticationPage'])->name('authenticationPage');
Route::post('login', [AuthorizationController::class, 'login'])->name('login');
Route::get('logout', [AuthorizationController::class, 'logout'])->name('logout');


Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('mainPage');

    Route::group(['prefix' => 'contacts'], function () {
        Route::get('main-page', [ContactController::class, 'contactsPage'])->name('contactsPage');
        Route::get('edit-page', [ContactController::class, 'editContactPage'])->name('editContactPage');
        Route::get('edit', [ContactController::class, 'editContact'])->name('editContact');
    });

    Route::group(['prefix' => 'promos'], function () {
        Route::get('main-page', [PromoController::class, 'promosPage'])->name('promosPage');
        Route::get('edit-page', [PromoController::class, 'editPromoPage'])->name('editPromoPage');
        Route::get('edit', [PromoController::class, 'editPromo'])->name('editPromo');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('main-page', [ProductController::class, 'index'])->name('productsIndexPage');
        Route::get('all-products', [ProductController::class, 'allProductsPage'])->name('allProductsPage');
        Route::get('add-product-page', [ProductController::class, 'addProductPage'])->name('addProductPage');
        Route::post('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::get('edit-product-page', [ProductController::class, 'editProductPage'])->name('editProductPage');
        Route::post('edit-product', [ProductController::class, 'editProduct'])->name('editProduct');
        Route::get('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('info-product-page', [ProductController::class, 'infoPage'])->name('infoProductPage');
        Route::get('all-categories-page', [ProductController::class, 'allCategoriesPage'])->name('allCategoriesPage');
        Route::get('add-category-page', [ProductController::class, 'addCategoryPage'])->name('addCategoryPage');
        Route::get('add-category', [ProductController::class, 'addCategory'])->name('addCategory');
        Route::get('edit-category-page', [ProductController::class, 'editCategoryPage'])->name('editCategoryPage');
        Route::get('edit-category', [ProductController::class, 'editCategory'])->name('editCategory');
        Route::get('delete-category', [ProductController::class, 'deleteCategory'])->name('deleteCategory');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('main-page', [PostController::class, 'index'])->name('postsIndexPage');
        Route::get('add-post-page', [PostController::class, 'addPostPage'])->name('addPostPage');
        Route::post('add-post', [PostController::class, 'addPost'])->name('addPost');
        Route::get('edit-post-page', [PostController::class, 'editPostPage'])->name('editPostPage');
        Route::post('edit-post', [PostController::class, 'editPost'])->name('editPost');
        Route::get('delete-post', [PostController::class, 'deletePost'])->name('deletePost');
        Route::get('info-post-page', [PostController::class, 'infoPage'])->name('infoPostPage');
        Route::get('delete-image', [PostController::class, 'deleteImage'])->name('deletePostImage');
    });

    Route::group(['prefix' => 'reels'], function () {
        Route::get('main-page', [ReelController::class, 'index'])->name('reelsIndexPage');
        Route::get('add-reel-page', [ReelController::class, 'addReelPage'])->name('addReelPage');
        Route::post('add-reel', [ReelController::class, 'addReel'])->name('addReel');
        Route::get('edit-reel-page', [ReelController::class, 'editReelPage'])->name('editReelPage');
        Route::post('edit-reel', [ReelController::class, 'editReel'])->name('editReel');
        Route::get('delete-reel', [ReelController::class, 'deleteReel'])->name('deleteReel');
        Route::get('info-reel-page', [ReelController::class, 'infoPage'])->name('infoReelPage');
    });

//  Route::get('delete-comment', [CommentController::class, 'deleteComment'])->name('deleteComment');
});

