<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $users = factory(User::class)->times(10)->make();

        User::insert($users->makeVisible('password','remember_token')->toArray());

        $user = User::find(1);
        $user->email = "lovan_zhang@163.com";
        $user->save();

        $user->assignRole('Founder');
    }
}
