<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyHeadController;
use App\Http\Controllers\FamilyMemberController;

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

Route::get('/', function () {
    return view('welcome');
});

/***************************** Family Head Routes  *************************/

// Route for displaying the all family head of the family 
Route::get('/family-head/index', [FamilyHeadController::class, 'index'])->name('family-head.index');

// Route for displaying the form to create a family head
Route::get('/family-head/create', [FamilyHeadController::class, 'create'])->name('family-head.create');

// Route for storing the data of the created family head
Route::post('/family-head/store', [FamilyHeadController::class, 'store'])->name('family-head.store');

// Route for displaying the data of the selected family head
Route::get('/family-head/{id}', [FamilyHeadController::class,'show'])->name('family-head.show');

/***************************** Family Memeber Routes  *************************/

// Route for displaying the all family members of the family 
Route::get('/family-member/index', [FamilyMemberController::class, 'index'])->name('family-member.index');

// Route for displaying the form to add a family member
Route::get('/family-member/create', [FamilyMemberController::class, 'create'])->name('family-member.create');

// Route for storing the data of the added family member
Route::post('/family-member/store', [FamilyMemberController::class, 'store'])->name('family-member.store');

// ROute for displaying member update form
Route::post('/family-member/update', [FamilyMemberController::class, 'update'])->name('family-member.update');
