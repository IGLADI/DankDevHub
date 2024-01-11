<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQQuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile/delete-account', [ProfileController::class, 'deleteAccount'])->name('profile.delete-account');
Route::post('/profile/delete-account', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('news/create/new', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}/update', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}/delete', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/faq-categories/{faq_category}/edit', [FAQCategoryController::class, 'edit'])->name('faq-categories.edit');
    Route::post('/faq-categories/{faq_category}/delete', [FAQCategoryController::class, 'delete'])->name('faq-categories.delete');
    Route::delete('/faq-categories/{faq_category}/delete', [FAQCategoryController::class, 'destroy'])->name('faq-categories.destroy');
    Route::post('/faq-questions/{faq_question}/answer', [FAQQuestionController::class, 'answer'])->name('faq-questions.answer');
    Route::post('/faq-questions/{faq_question}/promote', [FAQQuestionController::class, 'promoteToFaq'])->name('faq-questions.promote');
    Route::post('/faq-questions/{faq_question}/demote', [FAQQuestionController::class, 'demoteFromFaq'])->name('faq-questions.demote');
    Route::post('/users/{user}/promote', [UserController::class, 'promoteToAdmin'])->name('promoteToAdmin');
    Route::post('/users/{user}/demote', [UserController::class, 'demoteFromAdmin'])->name('demoteFromAdmin');
});

Route::get('/faq', [FAQCategoryController::class, 'index'])->name('faq.index');
Route::resource('/faq-categories', FAQCategoryController::class);
Route::resource('/faq-questions', FAQQuestionController::class);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/posts', [PostController::class, 'index'])->name('category.posts');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}/posts/create', [PostController::class, 'create'])->name('category.posts.create');
Route::post('/categories/{category}/posts', [PostController::class, 'store'])->name('category.posts.store');
Route::get('/categories/{category}/posts/{post}/edit', [PostController::class, 'edit'])->name('category.posts.edit');
Route::put('/categories/{category}/posts/{post}', [PostController::class, 'update'])->name('category.posts.update');
Route::delete('/categories/{category}/posts/{post}', [PostController::class, 'destroy'])->name('category.posts.destroy');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/about', function () {
    return view('about');
})->name('about');
