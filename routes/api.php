<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\countriesController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\CampusesController;
use App\Http\Controllers\StudentsController;
use App\Models\countries;
use App\Models\Schools;
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

//public
Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);


Route::get('/countries', [countriesController::class, 'index']);
Route::get('/countries/{id}', [countriesController::class, 'show']);


Route::get('/schools', [SchoolsController::class, 'index']);
Route::get('/schools/{id}', [SchoolsController::class, 'show']);


Route::get('/campuses', [CampusesController::class, 'index']);
Route::get('/campuses/{id}', [CampusesController::class, 'show']);


Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/{id}', [StudentsController::class, 'show']);



//student filtering by school (sql view structure used lvw_students)
Route::get('/students/filter/{id}', [StudentsController::class, 'school_fiter']);


//protected
Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::post('/countries', [countriesController::class,'store']);
    Route::put('/countries/{id}', [countriesController::class,'update']);
    Route::delete('/countries/{id}', [countriesController::class,'destroy']);


    Route::post('/schools', [SchoolsController::class,'store']);
    Route::put('/schools/{id}', [SchoolsController::class,'update']);
    Route::delete('/schools/{id}', [SchoolsController::class,'destroy']);


    Route::post('/campuses', [CampusesController::class,'store']);
    Route::put('/campuses/{id}', [CampusesController::class,'update']);
    Route::delete('cCampuses/{id}', [CampusesController::class,'destroy']);



    Route::post('/students', [StudentsController::class,'store']);
    Route::put('/students/{id}', [StudentsController::class,'update']);
    Route::delete('/students/{id}', [StudentsController::class,'destroy']);


    Route::post('/logout', [AuthController::class,'logout']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
