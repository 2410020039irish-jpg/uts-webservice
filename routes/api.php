<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ProdukController;

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('produk', ProdukController::class);