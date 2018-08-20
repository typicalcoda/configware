<?php

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
    if(Auth::check()) { return redirect('home'); }
    return redirect('login');
});


Route::get('/home', function(){
	return view('home.admin.index');
})->middleware('auth');



Route::get('/systems', function(){
	return view('home.admin.systems');
})->middleware('auth');


Route::get('/systems/{id}', function($id){
	$system = App\System::where('id', $id)->get()[0];
	return view('home.admin.system', compact('system'));
})->middleware('auth');


Route::get('/clients', function(){
	
	return view('home.admin.clients');

})->middleware('auth');


Route::get('/login', function(){
	if(Auth::check()) return redirect('home');
	return view('auth.admin.login');
});

Route::post('/login', function(){
	
	$email = request('email');
	$password = request('password');

	if(Auth::attempt(["email" => $email, "password" => $password])){
		return redirect('/home');
	}

	return redirect('login');


})->middleware('guest');