<?php

use App\Http\Controllers\API\ExcursionController;
use App\Http\Controllers\API\AgeController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CapineController;
use App\Http\Controllers\API\ContactUsAPIController;
use App\Http\Controllers\API\CruiseController;
use App\Http\Controllers\API\CruiseReviewController;
use App\Http\Controllers\API\FaciliteController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\MainController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\PolicyController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\SideSeeingController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\SocialController;
use App\Http\Controllers\API\SubscriberController;
use App\Http\Controllers\API\TermController;
use App\Http\Controllers\API\TripController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('signup',[AuthController::class,'SignUp']);
Route::post('verify',[AuthController::class,'verify']);
Route::post('login', [AuthController::class, 'Login']);
Route::post('forget-password', [AuthController::class, 'ForgetPassword']);
Route::post('confirm-code', [AuthController::class, 'ConfrimCode']);
Route::get('socials', [SocialController::class, 'socials']);
Route::get('sliders', [SliderController::class, 'sliders']);
Route::get('settings', [SettingController::class, 'settings']);
Route::get('galleries', [GalleryController::class, 'galleries']);
Route::get('facilites', [FaciliteController::class, 'facilites']);
Route::get('sideseeings', [SideSeeingController::class, 'sideSeeings']);
Route::post('contactus', [ContactUsAPIController::class,'store']);
Route::post('subscribe',[SubscriberController::class,'subscribe']);
Route::get('excursions', [ExcursionController::class, 'excursions']);
Route::get('ages', [AgeController::class, 'ages']);
Route::get('cabines', [CapineController::class, 'capines']);
Route::get('homepage', [MainController::class, 'homepage']);
Route::get('cruises',[CruiseController::class,'cruises']);
Route::get('cruise/{id}', [CruiseController::class, 'cruise']);
Route::get('trip/{id}', [TripController::class, 'trip']);
Route::get('offer/{id}', [OfferController::class, 'offer']);
Route::get('terms', [TermController::class, 'terms']);
Route::get('policies', [PolicyController::class, 'policies']);
Route::get('blogs', [BlogController::class, 'blogs']);
Route::get('blog/{id}', [BlogController::class, 'blog']);
Route::middleware(['auth:user','StatusMiddleware'])->group(function(){
    Route::get('profile', [AuthController::class, 'Profile']);
    Route::post('update-profile', [AuthController::class, 'UpdateProfile']);
    Route::get('logout', [AuthController::class, 'Logout']);
    Route::post('change-password', [AuthController::class, 'ChangePassword']);
    Route::post('cruise/add-or-update-review',[CruiseReviewController::class,'addOrUpdateReview']);
});
