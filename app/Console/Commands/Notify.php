<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
     //  $users= User::select('email')->get();
       $emails= User::pulck('email')->toArray();
        $data =['title'=>'programming', 'body'=>'phph'];

       foreach ($emails as $email){
           //how to send emails in laravel
           Mail::to($email)->send(new NotifyEmail($data));
       }
    }
}
