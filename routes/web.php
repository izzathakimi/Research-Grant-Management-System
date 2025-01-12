<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantProjectController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/academicians',\App\Http\Controllers\AcademicianController::class);
Route::resource('/grant-projects', GrantProjectController::class);
Route::resource('/milestones', MilestoneController::class);
Route::resource('/project-members', ProjectMemberController::class);
