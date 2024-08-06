<?php

namespace app\Packages\Domain\User;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private ?string $emailVerifiedAt;
    private string $password;
    private ?string $rememberToken;
    private string $createdAt;
    private string $updatedAt;

    public function __construct(
        int $id,
        string $name,
        string $email,
        ?string $emailVerifiedAt,
        string $password,
        ?string $rememberToken,
        string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->emailVerifiedAt = $emailVerifiedAt;
        $this->password = $password;
        $this->rememberToken = $rememberToken;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailVerifiedAt(): ?string
    {
        return $this->emailVerifiedAt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRememberToken(): ?string
    {
        return $this->rememberToken;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'email_verified_at' => $this->getEmailVerifiedAt(),
            'password' => $this->getPassword(),
            'remember_token' => $this->getRememberToken(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}
