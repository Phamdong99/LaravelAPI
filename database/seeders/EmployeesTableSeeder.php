<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['name'=>'Đồng','email'=>'Dong16021999@gmail.com','phone'=>'0971123759'],
            ['name'=>'nam','email'=>'Nam1999@gmail.com','phone'=>'0977216728']
        ];
        foreach ($employees as $employee){
            DB::table('employees')->insert($employee);
        }
    }
}
