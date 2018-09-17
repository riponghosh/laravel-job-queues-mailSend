<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\SendEmailMailable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
    }
}
