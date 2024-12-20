<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\User;

class ResetAdminsPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admins:reset {users*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets an admin\'s password if lost';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = $this->argument('users');
        $table = [];

        foreach($users as $username){
            $user = User::where('username', $username)->first();

            if(!$user) {
                $this->error('User \'' . $username . '\' does not exist.');
                continue;
            }

            $randomPassword = Str::random(12);
            $table[] = [$username, $randomPassword];
            $user->password = bcrypt($randomPassword);
            $user->save();
        }

        if(count($table) > 0){
            $this->line('The following user(s)\'s passwords were updated:');
            $this->table(['Username', 'New Password'], $table);
        }
    }
}
