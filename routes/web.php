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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chatMedicos', 'ChatMedicosController@index')->name('chatMedicos');
Route::get('/api/conversationsMedicos','ChatMedicosConversationController@index');

Route::get('/chatPacientes', 'ChatPacientesController@index')->name('chatPacientes');
Route::get('/api/conversationsPacientes','ChatPacientesConversationController@index');

Route::get('/api/conversations', 'ConversationController@index');
Route::get('/api/messages', 'MessageController@index');
Route::post('/api/messages', 'MessageController@store');
Route::get('/api/notconversations', 'NotConversationsController@index');
Route::get('/api/notconversationsPaciente', 'NotPacienteConversationsController@index');
Route::get('/api/notconversationsMedico', 'NotMedicoConversationsController@index');
Route::post('/api/insertConversations', 'InsertConversationController@store');