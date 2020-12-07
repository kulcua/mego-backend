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
                'name' => '35',
            ],
            [
                'name' => '36',
            ],
            [
                'name' => '37',
            ],
            [
                'name' => '38',
            ],
            [
                'name' => '39',
            ],
            [
                'name' => '40',
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
                'name' => 'Sandal',
                'gender_id' => 1,
            ],
            [
                'name' => 'Sneaker',
                'gender_id' => 1,
            ],
            [
                'name' => 'Slipper',
                'gender_id' => 1,
            ],
            [
                'name' => 'Sandal',
                'gender_id' => 2,
            ],
            [
                'name' => 'Sneaker',
                'gender_id' => 2,
            ],
            [
                'name' => 'Slipper',
                'gender_id' => 2,
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
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 2',
                'brand_id' => 2,
                'model_id' => 2,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 3',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 4',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 5',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 6',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 7',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 8',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 9',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 10',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 11',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            [
                'name'=> 'giay 12',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
             [
                'name'=> 'giay 13',
                'brand_id' => 3,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
             [
                'name'=> 'giay 14',
                'brand_id' => 1,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
             [
                'name'=> 'giay 15',
                'brand_id' => 2,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
             [
                'name'=> 'giay 16',
                'brand_id' => 2,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
              [
                'name'=> 'giay 17',
                'brand_id' => 2,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
              [
                'name'=> 'giay 18',
                'brand_id' => 2,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
              [
                'name'=> 'giay 19',
                'brand_id' => 2,
                'model_id' => 1,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
              [
                'name'=> 'giay 20',
                'brand_id' => 3,
                'model_id' => 2,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ],
            
        ]);

        DB::table('product_color')->insert([
            [
                'product_id' => 1,
                'color_id' => 1,
            ],
            [
                'product_id' => 1,
                'color_id' => 2,
            ],
            [
                'product_id' => 1,
                'color_id' => 3,
            ],
            [
                'product_id' => 1,
                'color_id' => 4,
            ],
            [
                'product_id' => 2,
                'color_id' => 1,
            ],
            [
                'product_id' => 2,
                'color_id' => 2,
            ],
            [
                'product_id' => 2,
                'color_id' => 3,
            ],
            [
                'product_id' => 2,
                'color_id' => 4,
            ],
            [
                'product_id' => 3,
                'color_id' => 1,
            ],
            [
                'product_id' => 3,
                'color_id' => 2,
            ],
            [
                'product_id' => 3,
                'color_id' => 3,
            ],
            [
                'product_id' => 3,
                'color_id' => 4,
            ],
            [
                'product_id' => 4,
                'color_id' => 1,
            ],
            [
                'product_id' => 4,
                'color_id' => 2,
            ],
            [
                'product_id' => 4,
                'color_id' => 3,
            ],
            [
                'product_id' => 4,
                'color_id' => 4,
            ],
            [
                'product_id' => 5,
                'color_id' => 1,
            ],
            [
                'product_id' => 5,
                'color_id' => 2,
            ],
            [
                'product_id' => 5,
                'color_id' => 3,
            ],
            [
                'product_id' => 5,
                'color_id' => 4,
            ],
            [
                'product_id' => 6,
                'color_id' => 1,
            ],
            [
                'product_id' => 6,
                'color_id' => 2,
            ],
            [
                'product_id' => 6,
                'color_id' => 3,
            ],
            [
                'product_id' => 6,
                'color_id' => 4,
            ],
            [
                'product_id' => 7,
                'color_id' => 1,
            ],
            [
                'product_id' => 7,
                'color_id' => 2,
            ],
            [
                'product_id' => 7,
                'color_id' => 3,
            ],
            [
                'product_id' => 8,
                'color_id' => 1,
            ],
            [
                'product_id' => 8,
                'color_id' => 2,
            ],
            [
                'product_id' => 8,
                'color_id' => 3,
            ],
            [
                'product_id' => 9,
                'color_id' => 1,
            ],
            [
                'product_id' => 9,
                'color_id' => 2,
            ],
            [
                'product_id' => 9,
                'color_id' => 3,
            ],
            [
                'product_id' => 10,
                'color_id' => 1,
            ],
            [
                'product_id' => 10,
                'color_id' => 2,
            ],
            [
                'product_id' => 10,
                'color_id' => 3,
            ],
            [
                'product_id' => 11,
                'color_id' => 1,
            ],
            [
                'product_id' => 11,
                'color_id' => 2,
            ],
            [
                'product_id' => 11,
                'color_id' => 3,
            ],
            [
                'product_id' => 12,
                'color_id' => 1,
            ],
            [
                'product_id' => 12,
                'color_id' => 2,
            ],
            [
                'product_id' => 12,
                'color_id' => 3,
            ],
        ]);

        DB::table('product_size')->insert([
            [
                'product_id' => 1,
                'size_id' => 1,
            ],
            [
                'product_id' => 1,
                'size_id' => 2,
            ],
            [
                'product_id' => 1,
                'size_id' => 3,
            ],
            [
                'product_id' => 1,
                'size_id' => 4,
            ],
            [
                'product_id' => 2,
                'size_id' => 1,
            ],
            [
                'product_id' => 2,
                'size_id' => 2,
            ],
            [
                'product_id' => 2,
                'size_id' => 3,
            ],
            [
                'product_id' => 2,
                'size_id' => 4,
            ],
            [
                'product_id' => 3,
                'size_id' => 1,
            ],
            [
                'product_id' => 3,
                'size_id' => 2,
            ],
            [
                'product_id' => 3,
                'size_id' => 3,
            ],
            [
                'product_id' => 3,
                'size_id' => 4,
            ],
            [
                'product_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 4,
                'size_id' => 2,
            ],
            [
                'product_id' => 4,
                'size_id' => 3,
            ],
            [
                'product_id' => 4,
                'size_id' => 4,
            ],
            [
                'product_id' => 5,
                'size_id' => 1,
            ],
            [
                'product_id' => 5,
                'size_id' => 2,
            ],
            [
                'product_id' => 5,
                'size_id' => 3,
            ],
            [
                'product_id' => 5,
                'size_id' => 4,
            ],
            [
                'product_id' => 6,
                'size_id' => 1,
            ],
            [
                'product_id' => 6,
                'size_id' => 2,
            ],
            [
                'product_id' => 6,
                'size_id' => 3,
            ],
            [
                'product_id' => 6,
                'size_id' => 4,
            ],
            [
                'product_id' => 7,
                'size_id' => 1,
            ],
            [
                'product_id' => 7,
                'size_id' => 2,
            ],
            [
                'product_id' => 7,
                'size_id' => 3,
            ],
            [
                'product_id' => 8,
                'size_id' => 1,
            ],
            [
                'product_id' => 8,
                'size_id' => 2,
            ],
            [
                'product_id' => 8,
                'size_id' => 3,
            ],
            [
                'product_id' => 9,
                'size_id' => 1,
            ],
            [
                'product_id' => 9,
                'size_id' => 2,
            ],
            [
                'product_id' => 9,
                'size_id' => 3,
            ],
            [
                'product_id' => 10,
                'size_id' => 1,
            ],
            [
                'product_id' => 10,
                'size_id' => 2,
            ],
            [
                'product_id' => 10,
                'size_id' => 3,
            ],
            [
                'product_id' => 11,
                'size_id' => 1,
            ],
            [
                'product_id' => 11,
                'size_id' => 2,
            ],
            [
                'product_id' => 11,
                'size_id' => 3,
            ],
            [
                'product_id' => 12,
                'size_id' => 1,
            ],
            [
                'product_id' => 12,
                'size_id' => 2,
            ],
            [
                'product_id' => 12,
                'size_id' => 3,
            ],
        ]);

        DB::table('collections')->insert([
            [
                'name' => 'Spring',
                'gender_id' => 1,
            ],
            [
                'name' => 'Winter',
                'gender_id' => 1,
            ],
            [
                'name' => 'Best seller',
                'gender_id' => 1,
            ],
            [
                'name' => 'New arrival',
                'gender_id' => 1,
            ],
            [
                'name' => 'Sale',
                'gender_id' => 1,
            ],
            [
                'name' => 'Spring',
                'gender_id' => 2,
            ],
            [
                'name' => 'Winter',
                'gender_id' => 2,
            ],
            [
                'name' => 'Best seller',
                'gender_id' => 2,
            ],
            [
                'name' => 'New arrival',
                'gender_id' => 2,
            ],
            [
                'name' => 'Sale',
                'gender_id' => 2,
            ],
        ]);

        DB::table('product_collection')->insert([
            [
                'product_id' => 1,
                'collection_id' => 1,
            ],
            [
                'product_id' => 1,
                'collection_id' => 2,
            ],
            [
                'product_id' => 2,
                'collection_id' => 1,
            ],
            [
                'product_id' => 3,
                'collection_id' => 1,
            ],
            [
                'product_id' => 4,
                'collection_id' => 1,
            ],
            [
                'product_id' => 5,
                'collection_id' => 1,
            ],
            [
                'product_id' => 6,
                'collection_id' => 1,
            ],
            [
                'product_id' => 7,
                'collection_id' => 1,
            ],
            [
                'product_id' => 8,
                'collection_id' => 1,
            ],
            [
                'product_id' => 9,
                'collection_id' => 2,
            ],
            [
                'product_id' => 10,
                'collection_id' => 2,
            ],
            [
                'product_id' => 11,
                'collection_id' => 2,
            ],
            [
                'product_id' => 12,
                'collection_id' => 2,
            ],
            [
                'product_id' => 13,
                'collection_id' => 2,
            ],
            [
                'product_id' => 14,
                'collection_id' => 1,
            ],
            [
                'product_id' => 15,
                'collection_id' => 3,
            ],
            [
                'product_id' => 16,
                'collection_id' => 3,
            ],
            [
                'product_id' => 17,
                'collection_id' => 2,
            ],
            [
                'product_id' => 18,
                'collection_id' => 1,
            ],
             [
                'product_id' => 19,
                'collection_id' => 1,
            ],
             [
                'product_id' => 20,
                'collection_id' => 2,
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'price' => 3046360,
                'color_id' => 1,
                'size_id' => 2,
            ],
            [
                'product_id' => 1,
                'price' => 3235620,
                'color_id' => 2,
                'size_id' => 3,
            ],
            [
                'product_id' => 2,
                'price' => 4324525,
                'color_id' => 1,
                'size_id' => 2,
            ],
            [
                'product_id' => 2,
                'price' => 3423445,
                'color_id' => 2,
                'size_id' => 3,
            ],
            [
                'product_id' => 3,
                'price' => 3034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 3,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 3,
                'price' => 3030050,
                'color_id' => 4,
                'size_id' => 1,
            ],
              [
                'product_id' => 4,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 4,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 4,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 4,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
              [
                'product_id' => 5,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 5,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 5,
                'price' => 3030650,
                'color_id' => 3,
                'size_id' => 1,
            ],
            [
                'product_id' => 5,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
              [
                'product_id' => 6,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 6,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 6,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 6,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
              [
                'product_id' => 7,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 7,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 7,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 8,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
  [
                'product_id' => 8,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 8,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 8,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 7,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 9,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 9,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 9,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 9,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 10,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 10,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 10,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 10,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 11,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 11,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 11,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 11,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 12,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 12,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 12,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 12,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 13,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 13,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 13,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 13,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
               [
                'product_id' => 14,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 14,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 14,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 14,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 15,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 15,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 15,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 15,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 16,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 16,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 16,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 16,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 17,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 17,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 17,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 17,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 18,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 18,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 18,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 18,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 19,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 19,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 19,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 19,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
            ],
             [
                'product_id' => 20,
                'price' => 1034650,
                'color_id' => 1,
                'size_id' => 2,
            ],
             [
                'product_id' => 20,
                'price' => 3000650,
                'color_id' => 2,
                'size_id' => 2,
            ],
             [
                'product_id' => 20,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 1,
            ],
            [
                'product_id' => 20,
                'price' => 3030650,
                'color_id' => 4,
                'size_id' => 2,
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