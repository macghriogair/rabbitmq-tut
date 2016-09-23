<?php
/**
 * @date    2016-09-22
f * @author  Patrick Mac Gregor <pmacgregor@3pc.de>
 */

namespace Macghriogair\Broker;

use PhpAmqpLib\Message\AMQPMessage;

class Producer extends AbstractClient
{
    public function publish($message, $channel)
    {
        $msg = new AMQPMessage(json_encode($message)/*, ['delivery_mode' => 2]*/);
        try {
            // $this->channel->basic_publish($msgffchannel);
            $this->channel->basic_publish($msg, $channel);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // $this->disconnect();
    }
}
