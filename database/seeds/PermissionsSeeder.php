<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   DB::table('permissions')->truncate();
        DB::table('permissions')->insert(['name'=> 'position-show']);
        DB::table('permissions')->insert(['name'=> 'position-edit']);
        DB::table('permissions')->insert(['name'=> 'position-create']);        
        DB::table('permissions')->insert(['name'=> 'position-delete']);
        DB::table('permissions')->insert(['name'=> 'attendance-show']);
        DB::table('permissions')->insert(['name'=> 'attendance-edit']);
        DB::table('permissions')->insert(['name'=> 'attendance-create']);        
        DB::table('permissions')->insert(['name'=> 'attendance-delete']);
        DB::table('permissions')->insert(['name'=> 'employee-show']);
        DB::table('permissions')->insert(['name'=> 'employee-create']);
        DB::table('permissions')->insert(['name'=> 'employee-edit']);
        DB::table('permissions')->insert(['name'=> 'teacher-show']);
        DB::table('permissions')->insert(['name'=> 'teacher-create']);
        DB::table('permissions')->insert(['name'=> 'teacher-edit']);
        DB::table('permissions')->insert(['name'=> 'teacher-delete']);
        DB::table('permissions')->insert(['name'=> 'student-show']);
        DB::table('permissions')->insert(['name'=> 'student-create']);
        DB::table('permissions')->insert(['name'=> 'student-edit']);
        DB::table('permissions')->insert(['name'=> 'student-delete']);
    }
}



