<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use App\Models\User;


class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    User::create([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('password'),
        'is_admin'=> 1
    ]);
    Categories::create([
            'name'=>'Shirts',
            'category_id' => 1,

    ]);
        Categories::create([
            'name' => 'Shoes',
            'category_id' => 2,

        ]);
        Categories::create([
            'name' => 'Flat',
            'category_id' => 1,

        ]);
        Categories::create([
            'name' => 'JOger',
            'category_id' => 1,

        ]);
        Categories::create([
            'name' => 'Shirts',
            'category_id' => 1,

        ]);
        Categories::create([
            'name' => 'jeen',
            'category_id' => 2,

        ]);
    }
}
