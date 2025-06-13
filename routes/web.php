<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\RoleController;
use App\Http\Controllers\Api\V1\Admin\AdminController;
use App\Http\Controllers\Api\V1\Admin\PermissionController;
use App\Http\Controllers\Api\V1\Auth\AdminAuth\AdminAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Web Routes (default 'web' middleware)
|
| These routes use the 'web' middleware group, which includes session state,
| CSRF protection, cookies, etc.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return 'This is the about page (web route)';
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
