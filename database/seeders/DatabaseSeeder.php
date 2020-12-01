<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            [
                'name' => 'admin',
            ],
            [
                'name' => 'customer',
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'admin',
                'title' => 'admin can manages all shop',
            ],
            [
                'name' => 'crud-order',
                'title' => 'only customer can crud their order',
            ],
        ]);

        DB::table('role_permission')->insert([
            [
                'role_id' => 1,
                'permission_id' => 1,
            ],
            [
                'role_id' => 2,
                'permission_id' => 2,
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'name admin',
                'email' => 'a@gm.com',
                'phone' => '0909090909',
                'role_id' => 1,
                'password' => Hash::make('a'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'customer 1',
                'email' => 'cus1@gm.com',
                'phone' => '0909090901',
                'role_id' => 2,
                'password' => Hash::make('1'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'customer 2',
                'email' => 'cus2@gmail.com',
                'phone' => '0909090902',
                'role_id' => 2,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => '0909090903',
                'role_id' => 2,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => '0909090904',
                'role_id' => 2,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
        ]);

        DB::table('sizes')->insert([
            [
                'name' => 'S',
            ],
            [
                'name' => 'M',
            ],
            [
                'name' => 'L',
            ],
            [
                'name' => 'XL',
            ],
        ]);

        DB::table('colors')->insert([
            [
                'name' => 'pink',
            ],
            [
                'name' => 'yellow',
            ],
            [
                'name' => 'red',
            ],
            [
                'name' => 'green',
            ],
            [
                'name' => 'blue',
            ],
        ]);

        DB::table('genders')->insert([
            [
                'name' => 'man',
            ],
            [
                'name' => 'woman',
            ],
        ]);

        DB::table('models')->insert([
            [
                'name' =>  'Model1'
            ],
            [
                'name' => 'Model2'
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' =>  'nike'
            ],
            [
                'name' => 'adidas'
            ],
            [
                'name' => 'bitis'
            ],
        ]);

        DB::table('products')->insert([
            [
                'name'=> 'giay 1',
                'brand_id' => 1,
                'model_id' => 1,
                'description' => 'des',
            ],
            [
                'name'=> 'giay 2',
                'brand_id' => 2,
                'model_id' => 2,
                'description' => 'des',
            ],
            [
                'name'=> 'giay 3',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'des',
            ],
        ]);

        DB::table('product_catalogs')->insert([
            [
                'name' => 'Catalog 1',
                'gender_id' => 1,
            ],
            [
                'name' => 'Catalog 2',
                'gender_id' => 1,
            ],
            [
                'name' => 'Catalog 3',
                'gender_id' => 2,
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'cost' => 200,
                'price' => 300,
                'color_id' => 1,
                'size_id' => 2,
                'product_cata_id' => 1,
            ],
            [
                'product_id' => 1,
                'cost' => 200,
                'price' => 320,
                'color_id' => 2,
                'size_id' => 3,
                'product_cata_id' => 1,
            ],
            [
                'product_id' => 2,
                'cost' => 200,
                'price' => 300,
                'color_id' => 1,
                'size_id' => 2,
                'product_cata_id' => 2,
            ],
            [
                'product_id' => 2,
                'cost' => 200,
                'price' => 300,
                'color_id' => 1,
                'size_id' => 2,
                'product_cata_id' => 2,
            ],
            [
                'product_id' => 3,
                'cost' => 200,
                'price' => 300,
                'color_id' => 1,
                'size_id' => 2,
                'product_cata_id' => 3,
            ],
        ]);

        DB::table('orders')->insert([
            [
                'user_id' => 2,
                'address' => Str::random(10),
                // 'total_amount' => 500,
                'status' => true,
            ],
            [
                'user_id' => 3,
                'address' => Str::random(10),
                // 'total_amount' => 300,
                'status' => true,
            ],
        ]);

        DB::table('order_details')->insert([
            [
                'order_id' => 1,
                'product_detail_id' => 1,
                'number' => 2,
            ],
            [
                'order_id' => 1,
                'product_detail_id' => 2,
                'number' => 1,
            ],
            [
                'order_id' => 2,
                'product_detail_id' => 3,
                'number' => 2,
            ],
        ]);
    }
}
