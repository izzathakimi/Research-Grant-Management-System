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
Route::resource('projectmembers', ProjectMemberController::class);

Route::get('/academicians/search', [AcademicianController::class, 'search']);

Route::delete('/project-members/{project_member_id}', [ProjectMemberController::class, 'destroy'])->name('project-members.destroy');