<?php

namespace App\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $email
 * @property string $token
 * @property string|null $created_at
 */
class EloquentPasswordResetToken extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';

    protected $primaryKey = 'email';
    public $incrementing = false;

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    /** @var string[] */
    protected $dates = [
        'created_at',
    ];
}
