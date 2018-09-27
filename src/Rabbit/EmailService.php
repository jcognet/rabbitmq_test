<?php
/**
 * Created by PhpStorm.
 * User: jeromecognet
 * Date: 27/09/2018
 * Time: 14:12
 */

namespace App\Rabbit;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class EmailService implements ConsumerInterface
{

    /**
     * @param AMQPMessage $msg
     * @return mixed|void
     */
    public function execute(AMQPMessage $msg)
    {
        $response = json_decode($msg->body, true);

        $type = $response["type"];
        var_dump($type);
        var_dump($response["data"]);
    }
}