<?php

use CodeCommerce\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

//        factory('CodeCommerce\Product', 30)->create();

        $faker = Faker::create();

        foreach(range(1,30) as $i) {

        Product::create([
            'name'          => $faker->firstName(),
            'description'   => $faker->sentence(),
            'price'         => $faker->randomNumber(2),
            'featured'         => $faker->boolean(),
            'recommend'         => $faker->boolean(),
            'category_id'   => $faker->numberBetween(1, 30)
        ]);
        }
    }
}
