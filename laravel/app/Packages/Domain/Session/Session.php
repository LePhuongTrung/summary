<?php

namespace app\Packages\Domain\Session;

class Session
{
    private string $id;
    private ?int $userId;
    private ?string $ipAddress;
    private ?string $userAgent;
    private string $payload;
    private int $lastActivity;

    public function __construct(
        string $id,
        ?int $userId,
        ?string $ipAddress,
        ?string $userAgent,
        string $payload,
        int $lastActivity
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
        $this->payload = $payload;
        $this->lastActivity = $lastActivity;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function getLastActivity(): int
    {
        return $this->lastActivity;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'ip_address' => $this->getIpAddress(),
            'user_agent' => $this->getUserAgent(),
            'payload' => $this->getPayload(),
            'last_activity' => $this->getLastActivity(),
        ];
    }
}
