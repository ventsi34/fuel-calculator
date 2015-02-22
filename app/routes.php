<?php
Route::get('/', array('before'=>'guest', 'uses'=>'LoginController@create'));
Route::post('/login', array(
        'before'=>'guest', 
        'as'=>'login', 
        'uses'=>'LoginController@store'));
Route::get('/logout', array(
        'as'=>'logout', 
        'uses'=>'LoginController@destroy'));
Route::get('/register', 'RegisterController@create');
Route::post('/register', 
            array('as'=>'register', 'uses'=>'RegisterController@store'));

//Authenticated user
Route::resource('dashboard', 'DashboardController');
Route::resource('fuel', 'FuelController');
Route::resource('settings', 'SettingsController');
Route::resource('stats', 'StatsController');
Route::resource('tax', 'TaxController');

//Migrations
Route::get('/artisan/migrate',  function() {
    $output = Artisan::call('migrate', array('--force' => true));
    return $output;
});

Route::get('/artisan/rollback',  function() {
    $output = Artisan::call('migrate:rollback', array('--force' => true));
    return $output;
});

Route::get('/mail',  function() {
    return 'Do not have username and password!';
    Mail::send('emails.sample_mail', ['name', 'Ventsi'], function($message) {
        $message->to('ventsislav.dimitrov@imperiaonline.org', "Sender")
                ->subject('Test message');
    });
});