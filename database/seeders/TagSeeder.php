<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Breaking News',
            'Trending',
            'Nepal',
            'Kathmandu',
            'Government',
            'Election',
            'Cricket',
            'Football',
            'Bollywood',
            'Hollywood',
            'Tourism',
            'Economy',
            'Stock Market',
            'Startups',
            'Innovation',
            'Climate',
            'COVID-19',
            'Education Reform',
            'University',
            'Interview',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
