<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Quiecents',
            'email' => 'quiecents@foro.com',
            'email_verified_at' => now(),
            'password' => Hash::make('hJwdjephkFeB'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(29)->create();

        User::factory()->count(20)
        ->has(
            Post::factory()
                    ->count(3)
                    ->state(function () {
                        return ['category_id' => Category::inRandomOrder()->first()];
                    })
        )
        ->create();

        

    }
}
