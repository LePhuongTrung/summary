<?php

namespace App\Interfaces;

use App\Packages\Domain\User\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): ?User;
}
