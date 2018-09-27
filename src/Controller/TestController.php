<?php
/**
 * Created by PhpStorm.
 * User: jeromecognet
 * Date: 27/09/2018
 * Time: 14:15
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{

    public function test(Request $request){
        $rabbitMessage = json_encode("totos");

        $this->get('old_sound_rabbit_mq.emailing_producer')->setContentType('application/json');
        $this->get('old_sound_rabbit_mq.emailing_producer')->publish($rabbitMessage);

        return new JsonResponse(array('Status' => 'OK'));
    }
}