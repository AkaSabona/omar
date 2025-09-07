<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SummernoteController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');

// Authentication Routes
Auth::routes(['register' => false]); // Disable registration

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/portfolio-cards', [AdminController::class, 'portfolioCards'])->name('portfolio-cards');
    Route::post('/hero/update', [AdminController::class, 'updateHero'])->name('hero.update');
    Route::post('/animations/update', [AdminController::class, 'updateAnimations'])->name('animations.update');
    Route::get('/animations/settings', [AdminController::class, 'getAnimationSettings'])->name('animations.settings');
    Route::post('/site-settings/update', [AdminController::class, 'updateSiteSettings'])->name('site-settings.update');
    Route::post('/featured-client-work/update', [AdminController::class, 'updateFeaturedClientWork'])->name('featured-client-work.update');
    
    // Portfolio Cards Management
    Route::post('/portfolio-cards/store', [AdminController::class, 'storePortfolioCard'])->name('portfolio-cards.store');
    Route::put('/portfolio-cards/{id}', [AdminController::class, 'updatePortfolioCard'])->name('portfolio-cards.update');
    Route::delete('/portfolio-cards/{id}', [AdminController::class, 'deletePortfolioCard'])->name('portfolio-cards.delete');
    Route::post('/portfolio-cards/positions', [AdminController::class, 'updatePortfolioCardPositions'])->name('portfolio-cards.positions');
    
    // Experience Management
    Route::resource('experiences', ExperienceController::class);
    Route::post('/experiences/positions', [ExperienceController::class, 'updatePositions'])->name('experiences.positions');
    
    // Logo Management
    Route::resource('logos', LogoController::class);
    Route::post('/logos/positions', [LogoController::class, 'updatePositions'])->name('logos.positions');
    
    // Message Management
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::patch('/messages/{message}/toggle-read', [MessageController::class, 'toggleRead'])->name('messages.toggle-read');
    Route::get('/messages/deleted/list', [MessageController::class, 'deleted'])->name('messages.deleted');
    Route::patch('/messages/{id}/restore', [MessageController::class, 'restore'])->name('messages.restore');
    Route::delete('/messages/{id}/force-delete', [MessageController::class, 'forceDelete'])->name('messages.force-delete');
    
    // Summernote image upload
    Route::post('/summernote/upload', [SummernoteController::class, 'uploadImage'])->name('summernote.upload');
    
    // TinyMCE image upload
    Route::post('/logos/upload-image', [LogoController::class, 'uploadImage'])->name('logos.upload-image');

});
