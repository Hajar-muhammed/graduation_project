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


Route::get('api',[ApiDiseaseController::class,"api"]);

//uplode
Route::post('upload',[ApiDiseaseController::class,"upload"]);

// Route::get('/classify', function () {
//     $fieldName = 'file';
//     $pathToFile = storage_path('app/public/stotage/1.PNG');
//     $endpoint = 'http://127.0.0.1:9999/classify';
//     $response = Curl::to($endpoint)
//         ->withFile($fieldName, $pathToFile)
//         ->post();
//     return $response;
// });

Route::get('classify',[ApiDiseaseController::class,"classify"]);

