<?php

namespace App\Console\Commands;

use App\Mail\RecommendMail;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a recommending email to a user';

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
     * @return int
     */
    public function handle()
    {
        $user = User::find($this->argument('user'));
        $userEmail = $user->email;
        info("Mail is trying to send ${userEmail} at ". now()->toDateTimeString());
        $this->line("Email:Sending to ${userEmail} ...");
        try {
            Mail::to($user)->send(new RecommendMail($user));
            $this->info("Email:Sent to ${userEmail} !");
            info("Email:Sent to ${userEmail} !");
        } catch (Exception $e) {
            $this->error($e);
            $this->line("Email:Failed to Send !");
            info("Email:Failed to Send !");
            info($e);
        }
    }
}
