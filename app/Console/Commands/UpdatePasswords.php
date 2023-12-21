<?php
// app/Console/Commands/UpdatePasswords.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UpdatePasswords extends Command
{
    protected $signature = 'passwords:update';
    protected $description = 'Update passwords to use Bcrypt';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->update([
                'password' => Hash::make($user->password),
            ]);
        }

        $this->info('Passwords updated successfully!');
    }
}
