<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 30)->create();

//        $faker = Faker::create();
//
//        foreach(range(1,30) as $i) {
//
//        Category::create([
//            'name'          => $faker->firstName(),
//            'description'   => $faker->sentence()
//        ]);
//        }
    }
}
