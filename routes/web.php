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
use App\Mail\SendEmailMailable;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-email', function () {
		$to = 'ripon.ghosh200@gmail.com';
	    $from = 'support@shuttlebd.com';
	    $email = 'ripon.ghosh200@gmail.com';
	    $name = 'Test';
	    $subject = 'Test';
	    $text = 'Test';
	    $mail_data = [
	    	'name'    => $name, 
	    	'text'    => $text,
	    	'subject' => $subject,
	    	'email'   => $email,
	    ];
	    $mail_send = Mail::send('email.name', $mail_data, function($message) use ($to,$from,$name,$subject) {
            $message->from($from, $name);
            $message->to($to);
            $message->subject($subject);
        });
	
    return 'mail send';
});
