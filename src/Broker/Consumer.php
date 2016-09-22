<?php
/**
 * @date    2016-09-22
 * @file    Consumer.php
 * @author  Patrick Mac Gregor <pmacgregor@3pc.de>
 */

namespace Macghriogair\Broker;

class Consumer extends AbstractClient
{
    public function listen($channel)
    {
        echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

        // $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume(
            $channel, '', false, false, false, false, array($this, 'processMessage')
        );

        while(count($this->channel->callbacks)) {
            $this->channel->wait();
        }

        $this->disconnect();
    }

    public function processMessage($msg)
    {
        echo " [x] " . date('H:i:s', time()) . " Received: " . $msg->body . "\n";
        $this->confirmDelivery($msg);
    }

    protected function confirmDelivery($msg)
    {
        $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    }
}
