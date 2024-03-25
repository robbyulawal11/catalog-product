<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

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
        return 'home';
    })->name('home');
    Route::get('/page/about', function(){
        return 'about';
    })->name('about');
    Route::get('/page/contact', function(){
        return 'contact';
    })->name('contact');
});
