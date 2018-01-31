<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 8:50 AM
 */

namespace Tiquette\Domain;


class Proposition
{
    private $describe;
    private $id;
    private $price;
    private $id_tickets;
    private $id_members;

    public static function submit(string $describe, int $price, string $id_tickets, string $id_members): self
    {
        return new self(GeneratorId::generate(),$describe, $price, $id_tickets, $id_members);
    }


    private function __construct(GeneratorId $generatorId, string $describe, int $price, string $id_tickets, string $id_members)
    {
        $this->id = $generatorId;
        $this->describe = $describe;
        $this->price = $price;
        $this->id_tickets = $id_tickets;
        $this->id_members = $id_members;

    }

    /**
     * @return string
     */
    public function getDescribe(): string
    {
        return $this->describe;
    }

    /**
     * @return GeneratorId
     */
    public function getId(): GeneratorId
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getIdTickets(): string
    {
        return $this->id_tickets;
    }

    /**
     * @return int
     */
    public function getIdMembers(): int
    {
        return $this->id_members;
    }




//    /**
//     * This method should be used only to hydrate object from a persistent storage
//     * and never to create / sign up a Member.
//     */
//    public static function fromArray(array $data): self
//    {
//        return new self(
//            GeneratorId::fromString($data['uuid']),
//            $data['event_name'],
//            \DateTimeImmutable::createFromFormat('Y-m-d H:i:00', $data['event_date']),
//            $data['event_description'],
//            0
//        );
    }

