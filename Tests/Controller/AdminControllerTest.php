<?php

namespace Hexmedia\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testDisplay()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/display');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/list');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/edit');
    }

}
