<?php

use App\Models\Makanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\MakananController;

Route::get('/', function () {
    $title = "menu kasir";
    $menus = Makanan::all();
    return view('kasir.index', compact('menus', 'title'));
});

Route::get('/tugas', [CrudController::class,'index']);

Route::get('/makanan/index', [MakananController::class, 'index' ]);
Route::post('/makanan/store', [MakananController::class, 'store' ]);
Route::post('/makanan/update', [MakananController::class, 'update' ]);
Route::post('/makanan/{$id}/destroy/', [MakananController::class, 'destroy' ]);
Route::resource('/makanan', MakananController::class);
Route::resource('/kasir', CrudController::class);

