<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\ResearchGrantController;
use App\Http\Controllers\ProjectMilestoneController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/academicians', AcademicianController::class);
Route::resource('/grant-projects', ResearchGrantController::class);
Route::resource('milestones', ProjectMilestoneController::class);
Route::resource('researchgrants', ResearchGrantController::class);
Route::resource('/project-members', ProjectMemberController::class);
