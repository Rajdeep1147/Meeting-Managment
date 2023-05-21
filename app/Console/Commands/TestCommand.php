<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Jobs\TestData;
use App\Models\User;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is Test Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->testFunction();
        return 0;
    }

    public function testFunction()
    {
        $users = User::where('email', '=', 'rajdeeprangra@gmail.com')->first();

        if ($users !== null) {
            TestData::dispatch($users->email)->delay(now()->addSeconds(5));
            $this->info('Email sending job dispatched for all users');
        } else {
            $this->info('No user found with the specified email');
        }
    }    
    
}
