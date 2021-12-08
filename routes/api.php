<?php

use App\Http\Controllers\Api\{
    TodoController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('todos', TodoController::class);

Route::get('/', function () {
    return response()->json([
        'success' => true,
    ]);
});
