<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 7:06 AM
 */

namespace Tiquette\Domain;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class GeneratorId
{
    private $uuid;

    public static function fromString(string $uuid): self
    {
        return new self(Uuid::fromString($uuid));
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }

    public function __toString()
    {
        return $this->uuid->toString();
    }

    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

}