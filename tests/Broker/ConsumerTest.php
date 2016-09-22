<?php
/**
 * @date    2016-09-22
 * @file    ConsumerTest.php
 * @author  Patrick Mac Gregor <pmacgregor@3pc.de>
 */

use Macghriogair\Broker\Consumer;

class ConsumerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_listens_for_messages()
    {
        $channel = 'hello';
        $consumer = new Consumer();
        $consumer->connect();
        $consumer->setupChannel('hello');
        $consumer->listen($channel);
    }
}
