<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\ResearchGrantController;
use App\Http\Controllers\ProjectMilestoneController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/academicians',\App\Http\Controllers\AcademicianController::class);
Route::resource('/grant-projects', ResearchGrantController::class);
Route::resource('/milestones', ProjectMilestoneController::class);
