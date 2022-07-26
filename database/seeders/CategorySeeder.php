<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('news','fashion','entertainment','science');
        foreach($categories as $category)
        {
            Category::factory()->create([
                'title' => $category,
                'slug' => Str::slug($category),
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
