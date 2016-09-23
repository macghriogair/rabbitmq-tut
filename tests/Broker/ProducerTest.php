<?php
/**
 * @date    2016-09-22
 * @file    ProducerTest.php
 * @author  Patrick Mac Gregor <pmacgregor@3pc.de>
 */

use Macghriogair\Broker\Producer;

class ProducerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_publishes_a_message()
    {
        $channel = 'logs';
        $producer = new Producer();
        $producer->connect();
        // $producer->setupChannel($channel);
        $producer->setupExchangeChannel($channel);
        for ($i=0; $i < 5; $i++) {
            $producer->publish(['payload' => "Hello World at $i"], $channel);
        }
    }
}
