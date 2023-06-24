<?php

use App\Http\Controllers\ApiDiseaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Ixudra\Curl\Facades\Curl;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('diseases', [ApiDiseaseController::class,"all"]);

Route::get('diseases/show/{id}', [ApiDiseaseController::class,"show"]);

Route::post('classify',[ApiDiseaseController::class,"classify"]);

