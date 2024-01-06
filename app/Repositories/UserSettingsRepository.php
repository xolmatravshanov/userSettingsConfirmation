<?php

namespace App\Repositories;

class UserSettingsRepository
{
    public function createSetting(int $userId, string $key, string $value): bool
    {
        return true;
    }

    public function updateSetting(int $userId, string $key, string $value): bool
    {
        return true;
    }
}
