<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Admin::firstOrCreate([
            'email' => 'Escrow@admin.com',
        ], [
            'first_name' => 'EscrowF',
            'last_name' => 'EscrowL',
            'phone_number' => '123456789',
            'password' => bcrypt('password'),
        ]);

        $roleId = Role::where('title', Role::SUPER_ADMIN_ROLE)->first('id')->id;

        $admin->roles()->sync($roleId);
    }
}
