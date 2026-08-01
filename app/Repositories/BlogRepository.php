<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogRepository
{
    public function getPublishedPaginated(int $perPage = 6): LengthAwarePaginator
    {
        return BlogPost::with('category')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function getRecent(int $limit = 3): Collection
    {
        return BlogPost::with('category')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take($limit)
            ->get();
    }

    public function findBySlug(string $slug): ?BlogPost
    {
        return BlogPost::with(['category', 'comments'])->where('slug', $slug)->first();
    }

    public function getAllCategories(): Collection
    {
        return BlogCategory::withCount('posts')->get();
    }

    public function create(array $data): BlogPost
    {
        return BlogPost::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $post = BlogPost::find($id);

        return $post ? $post->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $post = BlogPost::find($id);

        return $post ? $post->delete() : false;
    }
}
