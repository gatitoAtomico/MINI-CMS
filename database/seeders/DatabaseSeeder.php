<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create(array('name' => 'User Test1','email' => 'test1@gmail.com','password' => Hash::make('password')));
        User::create(array('name' => 'User Test2','email' => 'test2@gmail.com','password' => Hash::make('password')));
        Posts::create(array('title' =>'Why do we use it?','content' => '<b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</b>','status' => 'checked', 'image' => 'images/p6h6MuJUHat2x1r8DsAi3h0NtxffVypj9eKFRA3N.png', 'created_at' =>date('2022-06-21 16:43:05')));
        Posts::create(array('title' =>'Where can I get some?','content' => '<b>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</b>','status' => 'checked', 'image' => 'images/xBCGITwgCESLu96AsKaMVT7oxrxS9Hg3vuNDe3Ph.jpg', 'created_at' =>date('2022-06-21 16:43:05')));

    }
}
