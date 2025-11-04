<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Politics', 'slug' => 'politics', 'description' => 'Political news and updates', 'color' => '#EF4444', 'order' => 1],
            ['name' => 'Business', 'slug' => 'business', 'description' => 'Business and economy news', 'color' => '#10B981', 'order' => 2],
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Latest technology news', 'color' => '#3B82F6', 'order' => 3],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'Sports news and updates', 'color' => '#F59E0B', 'order' => 4],
            ['name' => 'Entertainment', 'slug' => 'entertainment', 'description' => 'Entertainment and lifestyle', 'color' => '#EC4899', 'order' => 5],
            ['name' => 'Health', 'slug' => 'health', 'description' => 'Health and wellness news', 'color' => '#8B5CF6', 'order' => 6],
            ['name' => 'Education', 'slug' => 'education', 'description' => 'Education news and updates', 'color' => '#6366F1', 'order' => 7],
            ['name' => 'World', 'slug' => 'world', 'description' => 'International news', 'color' => '#14B8A6', 'order' => 8],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
