<?php

use CodeCommerce\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

//        User::create([
//            'name'          => 'ricardo',
//            'email'   => 'ricardojustem@gmail.com',
//            'password'   =>Hash::make(12345)
//        ]);

        factory('CodeCommerce\User')->create([
            'name'          => 'ricardo',
            'email'   => 'ricardojustem@gmail.com',
            'password'   =>Hash::make(12345)
        ]);

        factory('CodeCommerce\User', 10)->create();

//        $faker = Faker::create();
//        foreach(range(1,30) as $i) {
//
//            User::create([
//                'name'          => $faker->name(),
//                'email'   => $faker->email(),
//                'password'   =>Hash::make($faker->word())
//            ]);
//        }
    }
}
