<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeVisitController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages/visitor/home/index');
// });

Route::get('resume', [HomeController::class, 'resume'])->name('home.resume');

Route::get('project', [HomeController::class, 'project'])->name('home.project');

Route::get('homevisit', [HomeController::class, 'homevisit'])->name('home.homevisit');




Route::resource('contact', ContactController::class); 


Route::resource('admin', AdminController::class); 

// Resume part

Route::resource('experience', ExperienceController::class); 

Route::resource('education', EducationController::class); 

Route::resource('skill', SkillController::class); 

Route::resource('language', LanguagesController::class); 
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/', [App\Http\Controllers\HomeVisitController::class, 'index'])->name('homevisit');


Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/'  , function(){
        return view('pages.admin.dashboard');
    })->name('admin.index');
    
    Route::resource('homevisit', HomeVisitController::class); 
    Route::resource('project', ProjectController::class); 
    Route::resource('resume', ResumeController::class); 
});
