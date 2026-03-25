<?php

use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'hello'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/profile', [Controller\Site::class, 'profile']);
Route::add(['GET', 'POST'], '/profile/edit', [Controller\Site::class, 'profileEdit'])->middleware('auth');
Route::add(['GET', 'POST'], '/users', [Controller\Site::class, 'users'])->middleware('auth');
Route::add(['GET', 'POST'], '/users/add', [Controller\Site::class, 'userAdd'])->middleware('auth');