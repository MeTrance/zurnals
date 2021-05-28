<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $workerRole = Role::where('name', 'worker')->first();
        $reporterRole = Role::where('name', 'reporter')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $workerRole = User::create([
            'name' => 'Worker User',
            'email' => 'worker@worker.com',
            'password' => Hash::make('password')
        ]);
        $reporterRole = User::create([
            'name' => 'Reporter User',
            'email' => 'reporter@reporter.com',
            'password' => Hash::make('password')
        ]);
        $viewerRole = User::create([
            'name' => 'Viewer User',
            'email' => 'viewer@viewer.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $workerRole->roles()->attach($workerRole);
        $reporterRole->roles()->attach($reporterRole);
        $viewerRole->roles()->attach($viewerRole);
    }
}
