<?php
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;

Route::get('/doctors', [DoctorController::class, 'index']);
Route::apiResource('appointments', AppointmentController::class)->except(['destroy']);
Route::get('/timeslots/available', [TimeSlotController::class, 'index']);
