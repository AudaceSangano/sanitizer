<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Carbon\Carbon;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

//backend route

Route::post('/login/operation', [AuthController::class, 'authenticate'])->name('auth.login.op');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    Route::get('/main', function () {
        $currentDate = Carbon::now();

        $startDate = $currentDate->startOfWeek();

        $dataForDays = [];

        for ($day = 0; $day < 7; $day++) {
            $date = $startDate->copy()->addDays($day);

            $formattedDate = $date->format('Y-m-d');

            $dataForDays[$date->format('l')] = DB::table('dust_status')->whereDate('created_at', $formattedDate)->get()->count();
        }

        if (Auth::user()->role_id=='1') {
            $data = [
                'dustbin' => DB::table('dust_status')->get()->count(),
                'wet' => DB::table('report')->join('dust_status', 'report.rp_dust', 'dust_status.st_id')
                            ->where('st_category', '1')->get()->count(),
                'dry' => DB::table('report')->join('dust_status', 'report.rp_dust', 'dust_status.st_id')
                            ->where('st_category', '0')->get()->count(),
                'user' => DB::table('users')->where('role_id', 2)->get()->count(),
                'days' => $dataForDays
            ];
        }else {
            $data = [
                'dustbin' => DB::table('dust_status')->where('st_status', 'full')->get()->count(),
                'wet' => DB::table('dust_status')->where('st_status', 'full')
                            ->where('st_category', '1')->get()->count(),
                'dry' => DB::table('dust_status')->where('st_status', 'full')
                            ->where('st_category', '0')->get()->count(),
                'user' => DB::table('users')->where('role_id', 2)->get()->count(),
                'days' => $dataForDays
            ];
        }
        return view('layout.index', $data);
    })->name('dashboard');

    Route::get('/register/user', function () {
        return view('layout.registerUser');
    });

    Route::get('/list/user', function () {
        return view('layout.user');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('layout.profile');
    })->name('profile');

    Route::post('/profile/information', [AuthController::class, 'personal'])->name('personal.change');
    Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('security.change');
    Route::post('/collector/registration', [AdminController::class, 'collectorRegister'])->name('collector.create');
    Route::get('/collector/{id}/remove', [AdminController::class, 'collectorRemove'])->name('user.delete');
    Route::get('/getDbStatus/{status}', [AdminController::class, 'getTank']);

    Route::get('/dustbin/create', function () {
        return view('layout.registerDust');
    })->name('new.dust');
    Route::post('/dustbin/create/operation', [AdminController::class, 'dustRegister'])->name('dust.create');
    Route::post('/dustbin/update/operation', [AdminController::class, 'dustUpdate'])->name('dust.update');

    Route::get('/dustbin/list', function () {
        return view('layout.dust');
    })->name('list.dust');
    Route::get('/dust/{id}/remove', [AdminController::class, 'dustRemove'])->name('dust.delete');

    Route::get('/dustbin/{id}/update', [AdminController::class, 'dustUpdateForm'])->name('dust.update.form');
    Route::get('/dustbin/{id}/view', [AdminController::class, 'dustview'])->name('dust.view');

    Route::get('/report', [AdminController::class, 'report'])->name('dust.report');
});
