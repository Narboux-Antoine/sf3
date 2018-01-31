<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

class Ticket
{
    private $id;
    private $eventName;
    private $eventDate;
    private $eventDescription;
    private $boughtAtPrice;

    public static function submit(string $eventName, \DateTimeImmutable $eventDate, string $eventDescription,
        int $boughtAtPrice): self
    {
        return new self(GeneratorId::generate(),$eventName, $eventDate, $eventDescription, $boughtAtPrice);
    }

    public function getId(): GeneratorId
    {
        return $this->id;
    }

    public function getEventName(): string
    {
        return $this->eventName;
    }

    public function getEventDate(): \DateTimeImmutable
    {
        return $this->eventDate;
    }

    public function getEventDescription(): string
    {
        return $this->eventDescription;
    }

    public function getBoughtAtPrice(): int
    {
        return $this->boughtAtPrice;
    }

    private function __construct(GeneratorId $generatorId, string $eventName, \DateTimeImmutable $eventDate, string $eventDescription, int $boughtAtPrice)
    {
        $this->id = $generatorId;
        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
        $this->eventDescription = $eventDescription;
        $this->boughtAtPrice = $boughtAtPrice;
    }

    /**
     * This method should be used only to hydrate object from a persistent storage
     * and never to create / sign up a Member.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            GeneratorId::fromString($data['uuid']),
            $data['event_name'],
            \DateTimeImmutable::createFromFormat('Y-m-d H:i:00', $data['event_date']),
            $data['event_description'],
            0
        );
    }
}
