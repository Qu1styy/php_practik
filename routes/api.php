<?php

use Src\Route;

Route::add('GET', '/', [Controller\Api::class, 'index']);
Route::add('POST', '/echo', [Controller\Api::class, 'echo']);
Route::add('POST', '/auth', [Controller\Api::class, 'auth']);
Route::add('GET', '/profile', [Controller\Api::class, 'profile'])->middleware('authApi');
