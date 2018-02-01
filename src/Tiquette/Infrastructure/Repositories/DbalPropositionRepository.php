<?php
/**
 * Created by PhpStorm.
 * User: metinet
 * Date: 1/31/18
 * Time: 9:05 AM
 */

namespace Tiquette\Infrastructure\Repositories;


use Tiquette\Domain\Proposition;
use Tiquette\Domain\PropositionRepository;
use Doctrine\DBAL\Connection;


class DbalPropositionRepository implements PropositionRepository
{

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }


    public function save(Proposition $proposition): void
    {
        $data = [
            'uuid' => (string)$proposition->getId(),
            'describe' => $proposition->getDescribe(),
            'price' => $proposition->getPrice(),
            'id_tickets' => $proposition->getIdTickets(),
            'id_members' => $proposition->getIdMembers(),
            'price_currency' => 'EUR',
        ];

        dump($this->connection->insert('propositions', $data));
        die;
    }

}