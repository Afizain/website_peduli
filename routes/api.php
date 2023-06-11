<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DataAduanController;
use App\Models\DataAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $data = $request->user();
    if($data){
        return response()->json([
            'success'=>"true",
            'data' =>$data,
            'message' =>"data telah diambil"
           ]);

       }
});
Route::apiResource('dataDiris', DataDiriController::class);
Route::apiResource('dataAduans', DataAduanController::class);