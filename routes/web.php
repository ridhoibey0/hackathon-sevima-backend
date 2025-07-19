<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Models\User;
use App\Models\Workers;
use App\Notifications\TelegramNotification;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix("admin")
    ->middleware(['auth', 'admin'])
->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name("admin.dashboard");
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function(){
            // $topComplaints = User::withCount('complaint')->get();
            // $workersFree = Workers::where('departmen_id', 2)->inRandomOrder()->first();
            $worker = Workers::where('departmen_id', 2)->inRandomOrder()->first();
            $data = [
                'nama' => "Ridho",
                "location" => "Tasik"
            ];
            $worker->notify(new TelegramNotification($data));
            dd($worker);

});