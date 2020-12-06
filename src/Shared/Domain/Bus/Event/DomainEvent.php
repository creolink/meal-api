<?php

declare(strict_types=1);

namespace App\Shared\Domain\Bus\Event;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

abstract class DomainEvent
{
    private string $eventId;
    private string $occurredOn;
    private string $aggregateId;

    public function __construct(string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        $this->eventId    = $eventId ?: Uuid::uuid4()->toString();
        $this->occurredOn = $occurredOn ?: (new DateTimeImmutable())->format("Ymd");
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}
