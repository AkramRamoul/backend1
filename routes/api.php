 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

// Route::get('/hello',function (){
//     echo 'Hello Laravel';
// });

Route::get('/category', [OffersController::class, 'list']);
//Route::get('/offers/{id}', [OffersController::class, 'show']);

// Route::post('/offer/{id?}', function ($id='offer1') {
//     return 'Post Offer '.$id;
// });
Route::get('/hello',function(){
    return 'hello';
});
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
// Route::post('logout',[AuthController::class, 'logout']);

Route::apiResource('category', CategoryController::class);
Route::apiResource('offer', OffersController::class);

Route::get('/offer/search/{title}', [OffersController::class, 'search']);
