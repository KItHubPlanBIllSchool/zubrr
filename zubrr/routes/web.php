<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationmail;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthManager;
use App\Models\Projects;
use App\Models\User;
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
    $users = User::all();
    foreach ($users as $user) {
        // Replace this with your logic to get the users you want to send the notification mail to.
    Mail::to($user->email)->send(new NotificationMail());
    }
    return view('welcome');
    
})->name('welcome');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::post('/createproject', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::post('import_user', [ProjectController::class, 'import_user'])->name('import_user');    
Route::get('export_user_pdf', [ProjectController::class, 'export_user_pdf'])->name('export_user_pdf');      


Route::get('/projects', function () {
    $user = Auth::user();

    if ($user->is_admin) {
        // Admin dashboard
        return redirect()->route('adminprojects');
    } else {
        // Regular user dashboard
        return redirect()->route('projects.list');
    }
})->name('projects');

Route::get('/projects', [ProjectController::class, 'list'])->name('projects.list');




