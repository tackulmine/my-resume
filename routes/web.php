<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\InterestController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\WorkExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::group([
    'middleware' => 'auth',
    'as' => 'admin.',
    'prefix' => 'admin',
], function() {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('education', EducationController::class)->except(['show']);
    Route::resource('project', ProjectController::class)->except(['show']);
    Route::resource('skill', SkillController::class)->except(['show']);
    Route::resource('language', LanguageController::class)->except(['show']);
    Route::resource('interest', InterestController::class)->except(['show']);
    Route::resource('social-media', SocialMediaController::class, ['parameters' => [
        'social-media' => 'socialMedia'
    ]])->except(['show']);
    Route::resource('experience', WorkExperienceController::class)->except(['show']);
});
