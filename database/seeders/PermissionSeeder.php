<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create article','guard_name'=>'web']);
        Permission::create(['name' => 'edit article','guard_name'=>'web']);
        Permission::create(['name' => 'delete article','guard_name'=>'web']);
    }
}
