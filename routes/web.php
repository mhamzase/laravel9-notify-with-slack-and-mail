<?php

use App\Jobs\TestNotificationJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/notify', function () {
    
    // NOTE: first step after cloning and configuring the project is to run: "php artisan optimize:clear"

    $user = App\Models\User::find(1);

    // using log with slack
    Log::channel('slack')->info('This is a test notification.');

    // Note: using job you need to run "php artisan queue:work" in terminal to start the queue worker process.
    // dispatch(new TestNotificationJob($user));

    // throw new \Exception('Test exception.');

    return 'Notified!';
});
