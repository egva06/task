<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $insertData = [];

        $last_id = DB::table('members')->insertGetId([
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'parent_id' => 0
        ]);

        for ($i=$last_id,$parent_id=$last_id;$i<$last_id + 3500;$i++) {

            if($i % rand(2,4) == 0)
                $parent_id++;

            $insertData[] = [
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'parent_id' => $parent_id
            ];
        }

        DB::table('members')->insert($insertData);
    }
}
