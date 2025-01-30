<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_userController;


Route::get('/',[admin_userController::class, 'adminform']);
Route::post('admin/addadmin', [admin_userController::class, 'addAdmin']);
Route::get('admin/viewadmin', [admin_userController::class, 'viewadmin']);
Route::get('admin/editadmin/{id}', [admin_userController::class, 'editadmin']);
Route::get('admin/updateadmin/{id}', [admin_userController::class, 'updateadmin']);