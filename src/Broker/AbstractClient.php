<?php
/**
 * @date    2016-09-22
 * @file    AbstractClient.php
 * @author  Patrick Mac Gregor <pmacgregor@3pc.de>
 */

namespace Macghriogair\Broker;

use PhpAmqpLib\Connection\AMQPStreamConnection;

abstract class AbstractClient
{
    protected $connection;
    protected $channel;

    public function connect()
    {
        $this->connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $this->channel = $this->connection->channel();
    }

    public function setupChannel($name)
    {
        $this->channel->queue_declare($name, false, false, false, false);
    }

    public function setupExchangeChannel($name)
    {
        $this->channel->exchange_declare($name, 'fanout', false, false, false);
    }

    public function disconnect()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
