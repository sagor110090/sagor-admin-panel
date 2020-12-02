<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {DB::table('permissions')->truncate();

        DB::table('permissions')->insert(['name'=> 'test-show']);
        DB::table('permissions')->insert(['name'=> 'test-create']);
        DB::table('permissions')->insert(['name'=> 'test-edit']);
        DB::table('permissions')->insert(['name'=> 'test-delete']);
        DB::table('permissions')->insert(['name'=> 'test1-show']);
        DB::table('permissions')->insert(['name'=> 'test1-create']);
        DB::table('permissions')->insert(['name'=> 'test1-edit']);
        DB::table('permissions')->insert(['name'=> 'test1-delete']);
        DB::table('permissions')->insert(['name'=> 'student-show']);
        DB::table('permissions')->insert(['name'=> 'student-create']);
        DB::table('permissions')->insert(['name'=> 'student-edit']);
        DB::table('permissions')->insert(['name'=> 'student-delete']);
    }
}
