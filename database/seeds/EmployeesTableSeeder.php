<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/employees.json";
        $dataJson = json_decode(file_get_contents($path), true); 

        foreach($dataJson as $row) {
            DB::table('employees')->insert([
                'id' => $row['id'],
                'isOnline' => ($row['isOnline']) ? 1: 0,
                'salary' => substr($row['salary'], 1),
                'age' => $row['age'],
                'position' => $row['position'],
                'name' => $row['name'],
                'gender' => $row['gender'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'skills' => json_encode($row['skills']),
            ]);
        }
    }
}
