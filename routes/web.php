<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AppController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\AttendanceMonthController;
use App\Http\Controllers\Admin\AttendanceTodayController;
use App\Http\Controllers\Admin\ProfileKaryawanController;

Route::middleware('auth')->group(function () {
    // ATTENDANCE TODAY
    Route::get('/dashboard/absen-today', [AttendanceTodayController::class, 'index'])->name('admin.absenToday.index');

    Route::get('/dashboard/absen-today/{attendance}/detail', [AttendanceTodayController::class, 'detail'])->name('admin.absenToday.detail');

    Route::patch('/dashboard/absen-today/{attendance}/update', [AttendanceTodayController::class, 'update'])->name('admin.absenToday.update');

    Route::delete('/dashboard/absen-today/{attendance}/delete', [AttendanceTodayController::class, 'destroy'])->name('admin.absenToday.delete');

    // ATTENDANCE MONTH
    Route::get('/dashboard/absen-month', [AttendanceMonthController::class, 'index'])->name('admin.absenMonth.index');

    Route::get('/dashboard/absen-month/{month}/detail', [AttendanceMonthController::class, 'detail'])->name('admin.absenMonth.detail');

    // KARYAWAN
    Route::get('/dashboard/karyawan', [KaryawanController::class, 'index'])->name('admin.karyawan.index');

    Route::get('/dashboard/karyawan/{user}/detail', [KaryawanController::class, 'detail'])->name('admin.karyawan.detail');

    Route::patch('/dashboard/karyawan/{user}/profile/update', [ProfileKaryawanController::class, 'updateProfile'])->name('admin.karyawan.update.profile');

    Route::patch('/dashboard/karyawan/{activity}/job/update', [ProfileKaryawanController::class, 'updateJob'])->name('admin.karyawan.update.job');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/app', [AppController::class, 'index'])->name('user.app');
});

require __DIR__ . '/auth.php';
