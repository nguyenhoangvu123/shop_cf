<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdviceController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingLayoutController;
use App\Http\Controllers\Admin\ManagementImageController;
use App\Http\Controllers\Admin\Accounting\FloorController;
use App\Http\Controllers\Admin\Accounting\StyleDesignController;
use App\Http\Controllers\Admin\AttributeMasterAccountingController;
use App\Http\Controllers\Admin\Accounting\TypeContructionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name("admin.login");
    Route::post('/login', [AuthController::class, 'postLogin'])->name("admin.post.login");
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'home'])->name("admin.dashboard");
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.post');
            Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
            Route::post('/list', [CategoryController::class, 'list'])->name('admin.category.list');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });
        Route::prefix('advice')->group(function () {
            Route::get('/', [AdviceController::class, 'index'])->name('admin.advice');
            Route::post('/list', [AdviceController::class, 'list'])->name('admin.advice.list');
            Route::get('/edit/{id}', [AdviceController::class, 'edit'])->name('admin.advice.edit');
            Route::post('/update/{id}', [AdviceController::class, 'update'])->name('admin.advice.update');
            Route::delete('/delete/{id}', [AdviceController::class, 'delete'])->name('admin.advice.delete');
        });
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.post');
            Route::post('/list', [PostController::class, 'list'])->name('admin.post.list');
            Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::post('/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
            Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
        });
        Route::prefix('image')->group(function () {
            Route::prefix('slider')->group(function () {
                Route::get('/', [ManagementImageController::class, 'index'])->name('admin.image.slider');
                Route::post('/list', [ManagementImageController::class, 'listSlider'])->name('admin.image.slider.list');
                Route::post('/store', [ManagementImageController::class, 'storeSlider'])->name('admin.image.slider.store');
                Route::post('/edit/{id}', [ManagementImageController::class, 'editSlider'])->name('admin.image.slider.edit');
                Route::post('/update/{id}', [ManagementImageController::class, 'updateSlider'])->name('admin.image.slider.update');
                Route::delete('/delete/{id}', [ManagementImageController::class, 'deleteSlider'])->name('admin.image.slider.delete');
                Route::post('/sort', [ManagementImageController::class, 'sortSlider'])->name('admin.image.slider.sort');
            });
        });

        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.comment');
            Route::post('/list', [CommentController::class, 'list'])->name('admin.comment.list');
            Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('admin.comment.edit');
            Route::post('/update/{id}', [CommentController::class, 'update'])->name('admin.comment.update');
            Route::delete('/delete/{id}', [CommentController::class, 'delete'])->name('admin.comment.delete');
        });

        Route::prefix('accounting')->group(function () {
            Route::prefix('floor')->group(function () {
                Route::get('/', [FloorController::class, 'index'])->name('admin.accounting.floor');
                Route::post('/list', [FloorController::class, 'list'])->name('admin.accounting.floor.list');
                Route::get('/create', [FloorController::class, 'create'])->name('admin.accounting.floor.create');
                Route::post('/store', [FloorController::class, 'store'])->name('admin.accounting.floor.store');
                Route::get('/edit/{id}', [FloorController::class, 'edit'])->name('admin.accounting.floor.edit');
                Route::post('/update/{id}', [FloorController::class, 'update'])->name('admin.accounting.floor.update');
                Route::delete('/delete/{id}', [FloorController::class, 'delete'])->name('admin.accounting.floor.delete');
            });
            Route::prefix('design')->group(function () {
                Route::get('/', [StyleDesignController::class, 'index'])->name('admin.accounting.design');
                Route::post('/list', [StyleDesignController::class, 'list'])->name('admin.accounting.design.list');
                Route::post('/store', [StyleDesignController::class, 'store'])->name('admin.accounting.design.store');
                Route::get('/edit/{id}', [StyleDesignController::class, 'edit'])->name('admin.accounting.design.edit');
                Route::post('/update/{id}', [StyleDesignController::class, 'update'])->name('admin.accounting.design.update');
                Route::delete('/delete/{id}', [StyleDesignController::class, 'delete'])->name('admin.accounting.design.delete');
            });

            Route::prefix('contruction')->group(function () {
                Route::get('/', [TypeContructionController::class, 'index'])->name('admin.accounting.contruction');
                Route::post('/list', [TypeContructionController::class, 'list'])->name('admin.accounting.contruction.list');
                Route::post('/list-design', [TypeContructionController::class, 'listStyleDesign'])->name('admin.accounting.contruction.list.design');
                Route::get('/create', [TypeContructionController::class, 'create'])->name('admin.accounting.contruction.create');
                Route::post('/store', [TypeContructionController::class, 'store'])->name('admin.accounting.contruction.store');
                Route::get('/edit/{id}', [TypeContructionController::class, 'edit'])->name('admin.accounting.contruction.edit');
                Route::post('/update/{id}', [TypeContructionController::class, 'update'])->name('admin.accounting.contruction.update');
                Route::delete('/delete/{id}', [TypeContructionController::class, 'delete'])->name('admin.accounting.contruction.delete');
            });

            Route::prefix('attr')->group(function () {
                Route::prefix('contruction')->group(function () {
                    Route::get('/', [AttributeMasterAccountingController::class, 'indexContruction'])->name('admin.accounting.attr.contruction');
                    Route::post('/list', [AttributeMasterAccountingController::class, 'listContruction'])->name('admin.accounting.attr.contruction.list');
                    Route::get('/create', [AttributeMasterAccountingController::class, 'createContruction'])->name('admin.accounting.attr.contruction.create');
                    Route::post('/store', [AttributeMasterAccountingController::class, 'storeContruction'])->name('admin.accounting.attr.contruction.store');
                    Route::get('/edit/{id}', [AttributeMasterAccountingController::class, 'editContruction'])->name('admin.accounting.attr.contruction.edit');
                    Route::post('/update/{id}', [AttributeMasterAccountingController::class, 'updateContruction'])->name('admin.accounting.attr.contruction.update');
                    Route::delete('/delete/{id}', [AttributeMasterAccountingController::class, 'deleteContruction'])->name('admin.accounting.attr.contruction.delete');
                });
                Route::prefix('supplies')->group(function () {
                    Route::get('/', [AttributeMasterAccountingController::class, 'indexSupplies'])->name('admin.accounting.attr.supplies');
                    Route::post('/list', [AttributeMasterAccountingController::class, 'listSupplies'])->name('admin.accounting.attr.supplies.list');
                    Route::get('/create', [AttributeMasterAccountingController::class, 'createSupplies'])->name('admin.accounting.attr.supplies.create');
                    Route::post('/store', [AttributeMasterAccountingController::class, 'storeSupplies'])->name('admin.accounting.attr.supplies.store');
                    Route::get('/edit/{id}', [AttributeMasterAccountingController::class, 'editSupplies'])->name('admin.accounting.attr.supplies.edit');
                    Route::post('/update/{id}', [AttributeMasterAccountingController::class, 'updateSupplies'])->name('admin.accounting.attr.supplies.update');
                    Route::delete('/delete/{id}', [AttributeMasterAccountingController::class, 'deleteSupplies'])->name('admin.accounting.attr.supplies.delete');
                });
            });
        });

        Route::prefix('setting')->group(function () {
            Route::prefix('basic')->group(function () {
                Route::get('/', [SettingController::class, 'listSettingBasic'])->name('admin.setting.basic');
                Route::post('/store', [SettingController::class, 'storeSettingBasic'])->name('admin.setting.basic.store');
            });
            Route::prefix('introduce')->group(function () {
                Route::get('/', [SettingController::class, 'indexSettingIntroduce'])->name('admin.setting.introduce');
                Route::post('/store', [SettingController::class, 'storeSettingIntroduce'])->name('admin.setting.introduce.store');
            });
            Route::prefix('contact')->group(function () {
                Route::get('/', [SettingController::class, 'indexSettingContact'])->name('admin.setting.contact');
                Route::post('/store', [SettingController::class, 'storeSettingContact'])->name('admin.setting.contact.store');
            });
            Route::prefix('layout')->group(function () {
                Route::get('/', [SettingLayoutController::class, 'index'])->name('admin.setting.layout');
                Route::post('/list', [SettingLayoutController::class, 'list'])->name('admin.setting.layout.list');
                Route::get('/create', [SettingLayoutController::class, 'create'])->name('admin.setting.layout.create');
                Route::post('/store', [SettingLayoutController::class, 'store'])->name('admin.setting.layout.store');
                Route::post('/list-post', [SettingLayoutController::class, 'listPost'])->name('admin.setting.layout.listPost');
                Route::get('/edit/{id}', [SettingLayoutController::class, 'edit'])->name('admin.setting.layout.edit');
                Route::post('/update/{id}', [SettingLayoutController::class, 'update'])->name('admin.setting.layout.update');
                Route::post('/sort', [SettingLayoutController::class, 'sort'])->name('admin.setting.layout.sort');
                Route::delete('/delete/{id}', [SettingLayoutController::class, 'delete'])->name('admin.setting.layout.delete');
            });
        });
    });
});
