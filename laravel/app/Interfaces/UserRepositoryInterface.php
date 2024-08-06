<?php

namespace App\Interfaces;

use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): ?EloquentUser;
}