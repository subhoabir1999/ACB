<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\State\StateController;
use App\Http\Controllers\Range\RangeController;
use App\Http\Controllers\Unit\UnitController;

use App\Http\Controllers\Admin\PressReleaseController;
use App\Http\Controllers\Admin\FirController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\MalpracticesController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Admin\DgMessageController;


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
use Illuminate\Support\Facades\Hash;

Route::group(['middleware'=>['guest']], function () {
Route::get('/', [FrontendHomeController::class, 'index'])->name('front.index');
});
Route::get('/press_release', [FrontendHomeController::class, 'press_release'])->name('pressRelease');
Route::get('/fir', [FrontendHomeController::class, 'fir'])->name('fir');
Route::get('/legal', [FrontendHomeController::class, 'legal'])->name('legal');
Route::get('/statistics', [FrontendHomeController::class, 'statistics'])->name('statistics');

Route::get('/events', function () {
    return view('frontend.events');
})->name('events');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 // AJAX
 Route::get('/fetch_units', [UnitController::class, 'fetchUnits'])->name('fetch.units');


Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
});
Route::group(['middleware'=>['auth']], function () {
    Route::get('user_list', [AdminController::class, 'user_list'])->name('user_list');
    Route::get('add_user', [AdminController::class, 'add_user'])->name('add_user');
    Route::post('create_user', [AdminController::class, 'create_user'])->name('create_user');
    Route::get('edit_user/{id}', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::post('update_user', [AdminController::class, 'update_user'])->name('update_user');
    Route::delete('destroy_user/{id}', [AdminController::class, 'destroy_user'])->name('user.destroy');
    Route::get('range_list', [AdminController::class, 'range_list'])->name('range_list');
    Route::get('unit_list', [AdminController::class, 'unit_list'])->name('unit_list');
    Route::get('add_range', [AdminController::class, 'add_range'])->name('add_range');
    Route::get('edit_range/{id}', [AdminController::class, 'edit_range'])->name('edit_range');
    Route::post('update_range', [AdminController::class, 'update_range'])->name('update_range');
    Route::post('create_range', [AdminController::class, 'create_range'])->name('create_range');
    Route::delete('destroy_range/{id}', [AdminController::class, 'destroy_range'])->name('range.destroy');
    Route::get('add_unit', [AdminController::class, 'add_unit'])->name('add_unit');
    Route::post('create_unit', [AdminController::class, 'create_unit'])->name('create_unit');
    Route::get('edit_unit/{id}', [AdminController::class, 'edit_unit'])->name('edit_unit');
    Route::post('update_unit', [AdminController::class, 'update_unit'])->name('update_unit');
    Route::delete('destroy_unit/{id}', [AdminController::class, 'destroy_unit'])->name('unit.destroy');

   

    // Press release
    Route::get('pr_list', [PressReleaseController::class, 'pr_list'])->name('pr_list');
    Route::get('add_pr', [PressReleaseController::class, 'add_pr'])->name('add_pr');
    Route::post('create_pr', [PressReleaseController::class, 'create_pr'])->name('create_pr');
    Route::get('edit_pr/{id}', [PressReleaseController::class, 'edit_pr'])->name('edit_pr');
    Route::post('update_pr', [PressReleaseController::class, 'update_pr'])->name('update_pr');
    Route::delete('destroy_pr/{id}', [PressReleaseController::class, 'destroy_pr'])->name('pr.destroy');

    // FIRs
    Route::get('fir_list', [FirController::class, 'fir_list'])->name('fir_list');
    Route::get('add_fir', [FirController::class, 'add_fir'])->name('add_fir');
    Route::post('create_fir', [FirController::class, 'create_fir'])->name('create_fir');
    Route::get('edit_fir/{id}', [FirController::class, 'edit_fir'])->name('edit_fir');
    Route::post('update_fir', [FirController::class, 'update_fir'])->name('update_fir');
    Route::delete('destroy_fir/{id}', [FirController::class, 'destroy_fir'])->name('fir.destroy');

    // Statistics
    Route::get('stat_list', [StatController::class, 'stat_list'])->name('stat_list');
    Route::get('add_stat', [StatController::class, 'add_stat'])->name('add_stat');
    Route::post('create_stat', [StatController::class, 'create_stat'])->name('create_stat');
    Route::get('edit_stat/{id}', [StatController::class, 'edit_stat'])->name('edit_stat');
    Route::post('update_stat', [StatController::class, 'update_stat'])->name('update_stat');
    Route::delete('destroy_stat/{id}', [StatController::class, 'destroy_stat'])->name('stat.destroy');

    // Legal
    Route::get('legal_list', [LegalController::class, 'legal_list'])->name('legal_list');
    Route::get('add_legal', [LegalController::class, 'add_legal'])->name('add_legal');
    Route::post('create_legal', [LegalController::class, 'create_legal'])->name('create_legal');
    Route::get('edit_legal/{id}', [LegalController::class, 'edit_legal'])->name('edit_legal');
    Route::post('update_legal', [LegalController::class, 'update_legal'])->name('update_legal');
    Route::delete('destroy_legal/{id}', [LegalController::class, 'destroy_legal'])->name('legal.destroy');

    // Malpractices
    Route::get('mp_list', [MalpracticesController::class, 'mp_list'])->name('mp_list');
    Route::get('add_mp', [MalpracticesController::class, 'add_mp'])->name('add_mp');
    Route::post('create_mp', [MalpracticesController::class, 'create_mp'])->name('create_mp');
    Route::get('edit_mp/{id}', [MalpracticesController::class, 'edit_mp'])->name('edit_mp');
    Route::post('update_mp', [MalpracticesController::class, 'update_mp'])->name('update_mp');
    Route::delete('destroy_mp/{id}', [MalpracticesController::class, 'destroy_mp'])->name('mp.destroy');
    
    //Home Slider
    Route::resource('sliders', SliderController::class);

    //Home Head Lines
    Route::resource('headlines', HeadlineController::class);

    //DG Messages
    Route::get('dgmessages', [DgMessageController::class, 'edit'])->name('dgmessages');
    Route::put('dgmessages/update', [DgMessageController::class, 'update'])->name('dgmessages.update');




});
Route::group(['as'=>'sate.','prefix' => 'sate','namespace'=>'Sate','middleware'=>['auth','sate']], function () {
    Route::get('dashboard', [StateController::class, 'index'])->name('dashboard');
});
Route::group(['as'=>'range.','prefix' => 'range','namespace'=>'Range','middleware'=>['auth','range']], function () {
    Route::get('dashboard', [RangeController::class, 'index'])->name('dashboard');
});
Route::group(['as'=>'unit.','prefix' => 'unit','namespace'=>'Unit','middleware'=>['auth','unit']], function () {
    Route::get('dashboard', [UnitController::class, 'index'])->name('dashboard');
});