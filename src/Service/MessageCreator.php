<?php
/**
 * Created by PhpStorm.
 * User: jeromecognet
 * Date: 27/09/2018
 * Time: 15:32
 */

namespace App\Service;


use OldSound\RabbitMqBundle\RabbitMq\Producer;

class MessageCreator
{
    /**
     * @var Producer
     */
    private $producer;

    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
    }

    /**
     * Publie un message dans Rabbit MQ
     * @param string $text
     */
    public function createMessage(string $text, string $type):void {
        $this->producer->setContentType('application/json');
        $this->producer->publish(json_encode(array(
            'data'=>$text, 'type'=>$type)
        ));
    }
}