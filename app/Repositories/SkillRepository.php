<?php

namespace App\Repositories;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Eloquent\Collection;

class SkillRepository
{
    public function getGroupedByCategory(): Collection
    {
        return SkillCategory::with(['skills' => function ($q) {
            $q->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();
    }

    public function getAll(): Collection
    {
        return Skill::with('category')->orderBy('order', 'asc')->get();
    }

    public function create(array $data): Skill
    {
        return Skill::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $skill = Skill::find($id);

        return $skill ? $skill->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $skill = Skill::find($id);

        return $skill ? $skill->delete() : false;
    }
}
