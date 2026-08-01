<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayoutCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Project Categories
        $projectCategories = [
            'Web Development',
            'UI/UX Design',
            'Mobile Apps',
            'Medical Cases',
            'Surgery',
            'Photography',
            'Portraits',
            'Civil Engineering',
            'Mechanical',
            'Corporate Law',
            'Family Law',
        ];

        foreach ($projectCategories as $category) {
            ProjectCategory::firstOrCreate([
                'name' => $category,
            ], [
                'slug' => Str::slug($category),
            ]);
        }

        // Blog Categories
        $blogCategories = [
            'Coding Tutorials',
            'Tech Trends',
            'Health & Wellness',
            'Medical Research',
            'Photography Tips',
            'Camera Gear',
            'Engineering Marvels',
            'Industrial Design',
            'Legal Advice',
            'Legal News',
        ];

        foreach ($blogCategories as $category) {
            BlogCategory::firstOrCreate([
                'name' => $category,
            ], [
                'slug' => Str::slug($category),
            ]);
        }
    }
}
