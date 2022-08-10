<?php

namespace Doctrine\DBAL\Event;

use Doctrine\Common\EventArgs;
use Doctrine\DBAL\Connection;

/**
 * Event Arguments used when a Driver connection is established inside Doctrine\DBAL\Connection.
 */
class ConnectionEventArgs extends EventArgs
{
<<<<<<< HEAD
    private Connection $connection;
=======
    /** @var Connection */
    private $connection;
>>>>>>> stage

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
