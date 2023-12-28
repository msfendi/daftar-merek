<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pemohon\PermohonanController;

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => config('admin.prefix'),
    'middleware' => ['auth', 'verified'],
    'as' => 'admin.'
], function () {
    Route::get('/', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('menu', 'MenuController')->except([
        'show'
    ]);
    Route::resource('menu.item', 'MenuItemController');
    Route::resource('category-blog', 'CategoryBlogController');
    Route::resource('blog', 'BlogController');
    Route::resource('permohonan', 'PermohonanController');
    Route::group([
        'prefix' => 'category',
        "as" => "category."
    ], function () {
        Route::resource('type', 'CategoryTypeController')->except([
            'show'
        ]);
        Route::resource('type.item', 'CategoryController');
    });
    Route::get('edit-account-info', 'UserController@accountInfo')->name('account.info');
    Route::post('edit-account-info', 'UserController@accountInfoStore')->name('account.info.store');
    Route::post('change-password', 'UserController@changePasswordStore')->name('account.password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::get('/permohonan/edit/{id}', [PermohonanController::class, 'edit'])->name('permohonan.edit');
});
