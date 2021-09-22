<?php

use App\Http\Controllers\ArtistController;
use App\Models\Artist;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('artists', [ArtistController::class, 'index']);
Route::post('artist', [ArtistController::class, 'store']);
Route::get('artist/{id}', [ArtistController::class, 'show']);
Route::delete('artist/{id}', [ArtistController::class, 'destroy']);
Route::post('/artist/{id}/like', [ArtistController::class, 'like']);
Route::post('/artist/{id}/dislike', [ArtistController::class, 'dislike']);

