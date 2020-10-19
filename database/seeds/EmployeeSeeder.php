<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 5; $i++) {

            DB::table('employees')->insert([

                'nik' => $faker->bankAccountNumber,
                'nama_depan' => $faker->firstName,
                'nama_belakang' => $faker->lastName,
            ]);
        }
    }
}
