<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\AdviceController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\IntroduceController;
use App\Http\Controllers\Client\AccountingController;
use App\Http\Controllers\Client\CommentIntroduceController;

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

Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/gioi-thieu', [IntroduceController::class, 'index'])->name('client.introduce');
Route::get('/lien-he', [ContactController::class, 'index'])->name('client.contact');
Route::get('/khai-toan', [AccountingController::class, 'index'])->name('client.accounting');
Route::post('/calculate', [AccountingController::class, 'calculate'])->name('client.accounting.calculate');
Route::get('/danh-muc/{slug_category}/{slug_category_childrent}', [CategoryController::class, 'childrent'])->name('client.category.childrent');
Route::get('/danh-muc/{slug_category}', [CategoryController::class, 'parent'])->name('client.category.parent');
Route::get('/{slug_category}/{slug_post}', [PostController::class, 'index'])->name('client.post');
Route::post('list-post-category', [PostController::class, 'listPostOfCategory'])->name('client.list.post.category');
Route::post('advice', [AdviceController::class, 'store'])->name('client.advice');
Route::post('introduce-comment-store', [CommentIntroduceController::class, 'store'])->name('introduce.comment.store');
Route::post('introduce-comment-list', [CommentIntroduceController::class, 'list'])->name('introduce.comment.list');
