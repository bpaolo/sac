<?php

namespace LongevoCoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class atendimentoControllerTest extends WebTestCase
{
    public function testAtendimento()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/atendimento');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show');
    }

}
