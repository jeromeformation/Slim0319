<?php
namespace App\Repository;

use App\Model\Connection;

class ProjectRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * ProjectRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}