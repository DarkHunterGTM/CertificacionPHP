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

Route::group([
    'middleware'=>['auth','estado'] ],
function(){
  Route::get('/admin','HomeController@index')->name('dashboard');
  Route::get('users' , 'UsersController@index' )->name('users.index');
    Route::post('users' , 'UsersController@store' )->name('users.store');
    Route::delete('users/{user}' , 'UsersController@destroy' );
    Route::post('users/update/{user}' , 'UsersController@update' );
    Route::get('users/{user}/edit', 'UsersController@edit' );
    Route::post('users/reset/tercero' , 'UsersController@resetPasswordTercero')->name('users.reset.tercero');
    Route::post('users/reset' , 'UsersController@resetPassword')->name('users.reset');
    Route::get( '/users/cargar' , 'UsersController@cargarSelect')->name('users.cargar');
    Route::get( '/users/cargarA' , 'UsersController@cargarSelectApertura')->name('users.cargarA');

    //rutas de inscripciones
    Route::get('inscripciones' , 'InscripcionController@index' )->name('inscripciones.index');
    Route::get( '/inscripciones/getJson/' , 'InscripcionController@getJson')->name('inscripciones.getJson');
    Route::get( '/inscripciones/new' , 'InscripcionController@create')->name('inscripciones.new');
    Route::post( '/inscripciones/save/' , 'InscripcionController@store')->name('inscripciones.save');

    //rutas de Estudiante
    Route::get('estudiantes' , 'EstudianteController@index' )->name('estudiantes.index');
    Route::get( '/estudiantes/getJson/' , 'EstudianteController@getJson')->name('estudiantes.getJson');
    Route::get( '/estudiantes/reinscripcion/{estudiante}' , 'EstudianteController@reinscripcion')->name('estudiantes.reinscripcion');
    Route::post( '/estudiantes/reinscripcion' , 'EstudianteController@store1')->name('estudiantes.save1');
    Route::get( '/estudiantes/edit/{estudiante}' , 'EstudianteController@edit')->name('estudiantes.edit');
    Route::put( '/estudiantes/{estudiante}/update' , 'EstudianteController@update')->name('estudiantes.update');


    //rutas de Personas
    Route::get('personas' , 'PersonaController@index' )->name('personas.index');
    Route::get( '/personas/getJson/' , 'PersonaController@getJson')->name('personas.getJson');
    Route::get( '/personas/edit/{persona}' , 'PersonaController@edit')->name('personas.edit');
    Route::put( '/personas/{persona}/update' , 'PersonaController@update')->name('personas.update');


    //rutas de pago
    Route::get('/pago/{estudiante}' , 'EstudianteController@show')->name('estudianes.show');
    Route::get( '/pago/{pago}/getJsonPago/', 'EstudianteController@getJsonPago')->name('estudiantes.getJsonPago');
    Route::get( '/pagos/new' , 'EstudianteController@create1')->name('pagos.new');
    Route::post( '/pagos' , 'EstudianteController@store')->name('pagos.save');
});


Route::get('/', function () {

    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/get/' , 'Auth\LoginController@getInfo')->name('user.get');
Route::post('/user/contador' , 'Auth\LoginController@Contador')->name('user.contador');
Route::post('/password/reset2' , 'Auth\ForgotPasswordController@ResetPassword')->name('password.reset2');
Route::get('/user-existe/', 'Auth\LoginController@userExiste')->name('user.existe');

//Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
