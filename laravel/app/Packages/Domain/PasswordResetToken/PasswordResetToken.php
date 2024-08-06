<?php

namespace app\Packages\Domain\PasswordResetToken;

use DateTimeImmutable;

class PasswordResetToken
{
    private string $email;
    private string $token;
    private ?DateTimeImmutable $createdAt;

    public function __construct(
        string $email,
        string $token,
        ?DateTimeImmutable $createdAt
    ) {
        $this->email = $email;
        $this->token = $token;
        $this->createdAt = $createdAt;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt ? $this->createdAt->format(DATE_ATOM) : null;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'token' => $this->getToken(),
            'created_at' => $this->getCreatedAt(),
        ];
    }
}
