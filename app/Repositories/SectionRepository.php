<?php

namespace App\Repositories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;

class SectionRepository
{
    public function getAllOrdered(): Collection
    {
        return Section::orderBy('order', 'asc')->get();
    }

    public function getActiveOrdered(): Collection
    {
        return Section::where('is_active', true)->orderBy('order', 'asc')->get();
    }

    public function find(int $id): ?Section
    {
        return Section::find($id);
    }

    public function update(int $id, array $data): bool
    {
        $section = $this->find($id);

        return $section ? $section->update($data) : false;
    }

    public function updateOrders(array $orders): void
    {
        foreach ($orders as $index => $id) {
            Section::where('id', $id)->update(['order' => $index + 1]);
        }
    }
}
