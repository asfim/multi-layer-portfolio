<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function getAll(): Collection
    {
        return Project::with('category')->orderBy('order', 'asc')->get();
    }

    public function getFeatured(): Collection
    {
        return Project::with('category')->where('is_featured', true)->orderBy('order', 'asc')->get();
    }

    public function getCategories(): Collection
    {
        return ProjectCategory::with('projects')->get();
    }

    public function findBySlug(string $slug): ?Project
    {
        return Project::with('category')->where('slug', $slug)->first();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $project = Project::find($id);

        return $project ? $project->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $project = Project::find($id);

        return $project ? $project->delete() : false;
    }
}
