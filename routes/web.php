<?php


// Route::get('/', function () {
//     return view('welcome');
// });

/* =================================================================================================== */

/* Retornando um texto plano */
// Route::get('/', function () {
//     return 'Minhas anotações';
// });

// Route::get('/contact', function () {
//     return 'Contato';
// });

/* =================================================================================================== */

/* Retornando vistas */

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

/* =================================================================================================== */

/* Vistas dinâmicas com Blade */
/*  Passando dados de um array para o view */

// Route::get('/', function () {
// 	$name = 'Larast';
//  	$message = 'Vistas dinâmicas com Blade';
// 	$date = date('Y-m-d H:i:s');
// 	$notes = [
// 		[
// 			'title' => 'Rotas Laravel',
// 			'body' => 'As rotas são definidas no arquivo web.php',
// 			'important' => true
// 		],
// 		[
// 			'title' => 'Blade',
// 			'body' => 'Blade é o motor de templates do Laravel',
// 			'important' => false
// 		]
// 	]
// 	;
//     return view('welcome', [ 'welcome' => 'Olá Mundo!', 'name' => $name, 'date' => $date, 'message' => $message, 'notes' => $notes ]);
// });

/* =================================================================================================== */

/* Query Builder */

// Route::get('/notes', function () {
// 	$notes = DB::table('notes')->get();
// 	return $notes;
// });

// Route::get('/notes', function () {
// 	$notes = DB::table('notes')->get();
// 	return view('notes/index', [ 'notes' => $notes ]);
// });

// Route::get('/notes/{id}', function ($id) {
// 	$note = DB::table('notes')->find($id);
// 	return view('notes/show', [ 'note' => $note ]);
// });

// Route::get('/notes', function () {
// 	$notes = DB::table('notes')->where('important', 1)->get();
// 	return view('notes/index', [ 'notes' => $notes ]);
// });

// Route::get('/notes', function () {
// 	$notes = DB::table('notes')->where('important', 0)->get();
// 	return view('notes/index', [ 'notes' => $notes ]);
// });

/* =================================================================================================== */
/* Eloquent */

// Route::get('/notes', function () {
// 	$notes = App\Note::all();
// 	return view('notes/index', [ 'notes' => $notes ]);
// });

// Route::get('/notes/{id}', function ($id) {
// 	$note = App\Note::find($id);
// 	return view('notes/show', [ 'note' => $note ]);
// });

Route::group(['middleware' => ['auth', 'check.paid']], function(){
	Route::get('/notes', 'NotesWithoutGroupController@index');
	Route::get('/groups/{group}/notes', 'NotesController@index');

	Route::get('/notes/create', 'NotesController@create');
	// Route::get('/notes/{id}', 'NotesController@show');
	Route::get('/notes/{note}', 'NotesController@show');
	Route::get('/notes/{note}/edit', 'NotesController@edit');
	Route::patch('/notes/{note}', 'NotesController@update');
	Route::post('/notes', 'NotesController@store');
	Route::delete('/notes/{note}', 'NotesController@destroy');
});

Route::get('/subscription-cancelled', function () {
    return view('bloqueado');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
