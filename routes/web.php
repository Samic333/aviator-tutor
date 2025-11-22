<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TutorApplicationController;
use App\Http\Controllers\AdminTutorController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/specialties', 'specialties')->name('specialties');
Route::view('/trust', 'trust')->name('trust');
Route::view('/become-tutor', 'become-tutor')->name('become-tutor');
Route::view('/about', 'pages.about')->name('about');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/contact', 'pages.contact')->name('contact');

// Authentication
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

// Public tutor browsing
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');

// Tutor dashboard profile builder
Route::get('/dashboard/tutor', [TutorDashboardController::class, 'edit'])->name('tutor.dashboard.edit');
Route::post('/dashboard/tutor', [TutorDashboardController::class, 'update'])->name('tutor.dashboard.update');

// Auth-protected routes
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-bookings', [BookingController::class, 'studentIndex'])->name('bookings.student');
    Route::get('/tutor/bookings', [BookingController::class, 'tutorIndex'])->name('bookings.tutor');
    Route::post('/tutors/{tutorId}/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/tutor/profile', [TutorProfileController::class, 'edit'])->name('tutor.profile.edit');
Route::post('/tutor/profile', [TutorProfileController::class, 'update'])->name('tutor.profile.update');

});

Route::get('/tutor/apply', [TutorApplicationController::class, 'create'])->name('tutor.apply');
Route::post('/tutor/apply', [TutorApplicationController::class, 'store'])->name('tutor.apply.store');
Route::get('/tutor/application-submitted', [TutorApplicationController::class, 'thankyou'])->name('tutor.apply.thankyou');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/tutors/applications', [AdminTutorController::class, 'index'])->name('tutors.index');
    Route::get('/tutors/applications/{application}', [AdminTutorController::class, 'show'])->name('tutors.show');
    Route::post('/tutors/applications/{application}/approve', [AdminTutorController::class, 'approve'])->name('tutors.approve');
    Route::post('/tutors/applications/{application}/reject', [AdminTutorController::class, 'reject'])->name('tutors.reject');
});
