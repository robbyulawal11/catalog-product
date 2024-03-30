<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminPageController2;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
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

Route::get('/welcome', [PageController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/data', function(Request $request){
    dd($request->all());
    return $request->nama . '-' . $request->alamat;
});

Route::get('/user/{id?}', function($id = 1){
    return 'ID:' . $id;
})->where('id', '[0-9]+');

//----------------------------------------------------------------------
//Tugas Sesi 1
Route::get('/bahasa/param/{item?}', function($item = 'php,java'){
    $response = explode(',', $item);
    foreach ($response as  $value) {
        echo $value. " ";
    }
});

Route::get('/bahasa/request', function(Request $item){
    $list = $item -> list;
    foreach ($list as  $value) {
        echo $value. " ";
    }

});
//----------------------------------------------------------------------


Route::redirect('/home', '/data');

Route::view('/welcome-view', '/welcome');



Route::get('/redirect-test', function(){
    return redirect()->route('welcome');
});

Route::prefix('/page')->name('page.')->group(function(){
    Route::get('/home', function(){
        return view('pages/home');
    })->name('home');
    Route::get('/about', function(){
        return view('pages/about');
    })->name('about');
    Route::get('/contact', function(){
        return view('pages/contact');
    })->name('contact');
});

Route::prefix('/admin')->controller(AdminPageController::class)->name('admin.')->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/chart', 'chart')->name('chart');
    Route::get('/table', 'table')->name('table');
});

Route::prefix('/admin2')->controller(AdminPageController2::class)->name('admin2.')->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/chart', 'chart')->name('chart');
    Route::get('/table', 'table')->name('table');
});

Route::middleware('auth')->group(function(){

    Route::middleware('role:admin')->prefix('/school')->controller(SchoolController::class)->name('school.')->group(function(){
        Route::get('/', 'index' )->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');

        Route::get('/{id}', 'show')->name('show');

        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');

        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::middleware('role:admin|member')->group(function(){
        Route::resource('/student', StudentController::class)->except(['show']);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/export/users', [App\Http\Controllers\ReportController::class, 'exportUsers']);
Route::get('/export/schools', [App\Http\Controllers\ReportController::class, 'exportSchools']);

Route::get('/import', [App\Http\Controllers\ReportController::class, 'importForm']);
Route::post('/import/school', [App\Http\Controllers\ReportController::class, 'importSchools']);
