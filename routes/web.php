<?php

use App\Http\Controllers\Admin\AttendanceMonthController;
use App\Http\Controllers\Admin\AttendanceTodayController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ProfileKaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AppController;
use App\Http\Controllers\User\AttendanceController;
use Illuminate\Support\Facades\Route;

// ADMIN
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

    Route::get('/dashboard/karyawan/create', [KaryawanController::class, 'create'])->name('admin.karyawan.create');

    Route::post('/dashboard/karyawan/store', [KaryawanController::class, 'store'])->name('admin.karyawan.store');

    Route::get('/dashboard/karyawan/{user}/detail', [KaryawanController::class, 'detail'])->name('admin.karyawan.detail');

    Route::patch('/dashboard/karyawan/{user}/profile/update', [ProfileKaryawanController::class, 'updateProfile'])->name('admin.karyawan.update.profile');

    Route::patch('/dashboard/karyawan/{user}/job/update', [ProfileKaryawanController::class, 'updateJob'])->name('admin.karyawan.update.job');

    Route::patch('/dashboard/karyawan/{contract}/contract/update', [ProfileKaryawanController::class, 'updateContract'])->name('admin.karyawan.update.contract');

    Route::post('/dashboard/karyawan/{user}/delete', [KaryawanController::class, 'destroy'])->name('admin.karyawan.delete');

    // JABATAN
    Route::get('/dashboard/jabatan', [PositionController::class, 'index'])->name('admin.jabatan.index');

    Route::post('/dashboard/jabatan', [PositionController::class, 'store'])->name('admin.jabatan.store');

    Route::get('/dashboard/jabatan/{position}/detail', [PositionController::class, 'detail'])->name('admin.jabatan.detail');

    Route::post('/dashboard/jabatan/{position}/deleted', [PositionController::class, 'destroy'])->name('admin.jabatan.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // EXPORT EXCEL
    Route::get('export-excel', [KaryawanController::class, 'exportExcel'])->name('export-excel.karyawan');
});

// USER
Route::middleware('auth')->group(function () {
    // ATTENDANCE TODAY
    Route::get('/app/attendance', [AppController::class, 'index'])->name('user.attendance.index');

    Route::get('/app/attendance/absen-pagi/create', [AppController::class, 'create_absenPagi'])->name('user.attendance.absen_pagi.create');

    Route::post('/app/absen-pagi/created', [AttendanceController::class, 'absenPagiCreate'])->name('user.absen-pagi.store');

    Route::get('/app/attendance/absen-siang/create', [AppController::class, 'create_absenSiang'])->name('user.attendance.absen_siang.create');

    Route::patch('/app/absen-siang/created', [AttendanceController::class, 'absenSiangCreate'])->name('user.absen-siang.store');

    Route::get('/app/attendance/absen-sore/create', [AppController::class, 'create_absenSore'])->name('user.attendance.absen_sore.create');

    Route::patch('/app/absen-sore/created', [AttendanceController::class, 'absenSoreCreate'])->name('user.absen-sore.store');

    Route::patch('/app/izin/created', [AttendanceController::class, 'absenIzinCreate'])->name('user.absen-izin.store');

    Route::get('/app/attendance/{attendance}/detail', [AppController::class, 'detail'])->name('user.attendance.detail');

    // ATTENDENCE MONTH
    Route::get('/app/attendance-month', [AppController::class, 'allMonth'])->name('user.attendanceMonth.index');

    Route::get('/app/attendance-month/{month}/detail', [AppController::class, 'detailMonth'])->name('user.attendanceMonth.detail');

    // PROFILE
    Route::get('/app/profile', [AppController::class, 'profile'])->name('user.profile');

    Route::patch('/app/profile/update', [AppController::class, 'update'])->name('user.update.profile');
});

require __DIR__.'/auth.php';
