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

Route::post('/sendmail','MailController@send');

/* Route::post('/sendmail', function() 
{
    $email = $request->input('email');
	$data = array('name' => 'Jordan');
	
	Mail::send('email.welcome', $data, function($message)
	{
		$message->to('dasha.ree1@gmail.com')
		->subject('Hi there!  Laravel sent me!');
	});
});
 */