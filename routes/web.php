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
	$systems = App\System::all();
	return view('home.admin.systems', compact('systems'));
})->middleware('auth');


Route::get('/test', function(){
	$app = App\System::all()[0];
	return $app->config()->models()[0];
});

Route::get('/systems/new', function(){
	$system_types = App\SystemType::all();
	return view('home.admin.new_system', compact('system_types'));
})->middleware('auth');

Route::get('/systems/edit/{id}', function($id){
	$created_system = App\System::where('id', $id)->get()[0];
	return view('home.admin.new_system', compact('created_system'));
})->middleware('auth');


Route::post('/systems/new', function(){
	$validated_data = request()->validate([
		'name' => 'required|alpha|unique:systems|max:255',
		'description' => 'required',
		'type_id' => 'required',
	]);

	$s = new App\System;
	$s->name = request('name');
	$s->description = request('description');
	$s->type_id = request('type_id');
	$s->save();

	session()->flash('msg', 'Successfully created a new system.');
	return redirect("/systems/edit/$s->id");
})->middleware('auth');


Route::post("/systems/delete_all", function(){
	App\System::truncate();
	return back();
});

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
})->name("login");

Route::post('/login', function(){
	$email = request('email');
	$password = request('password');

	if(Auth::attempt(["email" => $email, "password" => $password])){
		return redirect('/home');
	}

	return redirect('login');
})->middleware('guest');