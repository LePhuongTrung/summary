<?php

namespace App\Infrastructure\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Infrastructure\Eloquent\EloquentUser;
use App\Packages\Domain\User\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    private EloquentUser $model;

    public function __construct(EloquentUser $model)
    {
        $this->model = $model;
    }

    public function getByEmail(string $email): ?User
    {
        $user = $this->model->findByEmail($email)->first();
        return $user ? $this->toDomain($user) : null;
    }

    private function toDomain(EloquentUser $user): User
    {
        return new User(
            $user->id,
            $user->full_name,
            $user->email,
            $user->email_verified_at,
            $user->password,
            $user->remember_token,
            $user->created_at,
            $user->updated_at
        );
    }
}