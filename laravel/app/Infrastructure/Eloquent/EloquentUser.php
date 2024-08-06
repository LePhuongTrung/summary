<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string|null $phone_number
 * @property string|null $email_verified_at
 * @property string|null $updated_at
 * @property string|null $created_at
 */
class EloquentUser extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @var string[] */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /** @var string[] */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @var string[] */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFindByEmail(Builder $query, string $email): Builder
    {
        return $query->where('email', $email);
    }

    public function scopeFindById(Builder $query, int $id): Builder
    {
        return $query->where('id', $id);
    }
}
