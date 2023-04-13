<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin Route
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\AdminAboutPageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkingProcessController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactMessage;

// Front Route
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;




// Front Route
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [AboutController::class, 'About'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/message', [ContactController::class, 'Message'])->name('message');
Route::get('/service/details/{id}', [AboutController::class, 'ServiceDetails'])->name('service.details');
Route::get('/resume/download', [HomeController::class, 'Resume'])->name('resume');



// Admin Route
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function(){
    // Dashboard
    Route::get('/dashboard',[DashboardController::class,'Dashboard'])->name('dashboard');
    // Admin Profile
    Route::controller(AdminProfileController::class)->group(function(){
        Route::get('profiles','Index')->name('admin.profile');
        Route::post('profiles','store')->name('profile.store');
    });
    // Home Page
    Route::controller(HomePageController::class)->group(function(){
        // Home Banner
        Route::get('home/banner','HomeBanner')->name('home.banner');
        Route::post('home/banner/{id}','Store')->name('banner.store');
        // Home About
        Route::get('home/about','HomeAbout')->name('home.about');
        Route::post('home/about','StoreIcon')->name('home.about.store');
        Route::get('home/about/delete/{id}','Destroy')->name('home.about.delete');
    });
    // About Page
    Route::controller(AdminAboutPageController::class)->group(function(){
        // About Banner
        Route::get('about/banner','AboutBanner')->name('about.banner');
        Route::post('about/banner/','Store')->name('about.store');
        Route::get('about/details/','Details')->name('about.details');
        // About Details
        Route::post('about/details/','AboutStore')->name('AboutStoreDetails');
        //skills
        Route::post('about/skill/','Skill')->name('about.skill');
        Route::get('about/skill/{id}','SkillDelete')->name('skill.delete');
        // Awoard
        Route::post('about/award/','AwardStore')->name('award.store');
        Route::get('about/award/{id}','AwardDelete')->name('award.delete');
        // Education
        Route::post('about/education/','EducationStore')->name('education.store');
        Route::get('about/education/{id}','EducationDelete')->name('edu.delete');
    });
    // Service
    Route::resource('services', ServiceController::class);
    // Woring Process
    Route::resource('working-process', WorkingProcessController::class);
    // Website Setting
    Route::get('setting',[SettingController::class, 'index'])->name('setting.index');
    Route::post('setting/update',[SettingController::class, 'store'])->name('setting.store');
    Route::get('setting/logo',[SettingController::class, 'SettingLogo'])->name('setting.logo');
    Route::post('setting/logo/store',[SettingController::class, 'LogoStore'])->name('setting.logo.store');
    // Contact Message
    Route::get('unread-contact-message',[ContactMessage::class,'unRead'])->name('unread');
    Route::get('read-contact-message',[ContactMessage::class,'Read'])->name('read');
    Route::get('view-contact-message/{id}',[ContactMessage::class,'ViewMessage'])->name('view.message');
    Route::get('mark-as-read/{id}',[ContactMessage::class,'MarkAsRead'])->name('mark.read');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
