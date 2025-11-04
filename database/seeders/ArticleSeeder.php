<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        if ($users->isEmpty() || $categories->isEmpty()) {
            return;
        }

        $articles = [
            [
                'title' => 'Nepal Economy Shows Strong Growth in Q3',
                'excerpt' => 'Economic indicators point to robust recovery with tourism sector leading the charge.',
                'content' => '<p>Nepal\'s economy has demonstrated remarkable resilience with a strong growth trajectory in the third quarter. The tourism sector has been the primary driver of this growth, with visitor numbers exceeding pre-pandemic levels.</p><p>According to the latest data from the Ministry of Finance, the GDP growth rate has reached 5.8%, surpassing earlier projections. This growth is attributed to increased tourist arrivals, improved agricultural output, and a boost in remittance inflows.</p><p>Economists believe this trend will continue into the next quarter, provided political stability is maintained and infrastructure development projects progress as planned.</p>',
                'category' => 'Business',
                'status' => 'published',
                'is_featured' => true,
                'tags' => ['Nepal', 'Economy', 'Tourism'],
            ],
            [
                'title' => 'New Technology Hub Opens in Kathmandu',
                'excerpt' => 'State-of-the-art technology park aims to attract international startups and foster innovation.',
                'content' => '<p>A cutting-edge technology hub has officially opened its doors in the heart of Kathmandu, marking a significant milestone in Nepal\'s digital transformation journey.</p><p>The facility, spanning over 50,000 square feet, offers world-class infrastructure including high-speed internet, modern workspaces, and innovation labs. It aims to provide a collaborative environment for startups, established tech companies, and entrepreneurs.</p><p>The initiative is expected to create thousands of jobs and position Nepal as an emerging tech destination in South Asia.</p>',
                'category' => 'Technology',
                'status' => 'published',
                'is_featured' => true,
                'tags' => ['Technology', 'Kathmandu', 'Startups', 'Innovation'],
            ],
            [
                'title' => 'Nepal Cricket Team Prepares for International Tournament',
                'excerpt' => 'National team undergoes intensive training ahead of the upcoming championship.',
                'content' => '<p>The Nepal national cricket team is gearing up for an important international tournament with intensive training sessions being conducted across the country.</p><p>Head coach expressed confidence in the team\'s preparation, highlighting improvements in both batting and bowling departments. The squad includes a mix of experienced players and promising young talent.</p><p>Cricket enthusiasts across the nation are showing tremendous support, with expectations running high for the team\'s performance.</p>',
                'category' => 'Sports',
                'status' => 'published',
                'is_breaking' => true,
                'tags' => ['Cricket', 'Nepal', 'Sports'],
            ],
            [
                'title' => 'Government Announces Education Reform Initiative',
                'excerpt' => 'Comprehensive reforms aim to modernize curriculum and improve learning outcomes.',
                'content' => '<p>The government has unveiled an ambitious education reform initiative designed to transform the educational landscape of the country.</p><p>Key highlights of the reform include curriculum modernization, teacher training programs, and increased investment in educational infrastructure. The initiative also emphasizes digital literacy and skill development to prepare students for the future job market.</p><p>Education experts have welcomed the move, calling it a step in the right direction for improving educational standards.</p>',
                'category' => 'Education',
                'status' => 'published',
                'is_featured' => false,
                'tags' => ['Education', 'Government', 'Education Reform'],
            ],
            [
                'title' => 'Climate Action Summit Draws Global Attention',
                'excerpt' => 'International leaders gather to discuss climate change challenges facing mountain regions.',
                'content' => '<p>A major climate action summit has brought together international leaders, scientists, and environmental activists to address the pressing challenges of climate change, particularly in mountain regions.</p><p>The summit focuses on sustainable development, glacier preservation, and the impact of climate change on mountain communities. Nepal, being home to the world\'s highest peaks, plays a crucial role in these discussions.</p><p>Participants have pledged to increase collaboration and resource allocation to combat climate change effectively.</p>',
                'category' => 'World',
                'status' => 'published',
                'is_featured' => false,
                'tags' => ['Climate', 'Nepal', 'World'],
            ],
        ];

        foreach ($articles as $articleData) {
            $category = $categories->where('name', $articleData['category'])->first();
            $articleTags = $articleData['tags'];
            unset($articleData['tags']);
            unset($articleData['category']);

            $article = Article::create([
                ...$articleData,
                'user_id' => $users->random()->id,
                'category_id' => $category->id,
                'published_at' => now(),
            ]);

            $tagIds = $tags->whereIn('name', $articleTags)->pluck('id');
            $article->tags()->attach($tagIds);
        }
    }
}
