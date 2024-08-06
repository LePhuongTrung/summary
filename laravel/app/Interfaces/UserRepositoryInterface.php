<?php

namespace App\Interfaces;

use App\Infrastructure\Eloquent\EloquentUser;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): ?EloquentUser;
}
