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
        $channel = 'hello';
        $producer = new Producer();
        $producer->connect();
        $producer->setupChannel('hello');
        $producer->publish("Hello World", $channel);
    }
}
