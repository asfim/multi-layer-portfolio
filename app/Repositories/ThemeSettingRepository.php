<?php

namespace App\Repositories;

use App\Models\ThemeSetting;

class ThemeSettingRepository
{
    public function getActive(): ThemeSetting
    {
        return ThemeSetting::firstOrCreate(['id' => 1]);
    }

    public function update(array $data): ThemeSetting
    {
        $theme = $this->getActive();
        $theme->update($data);

        return $theme;
    }
}
