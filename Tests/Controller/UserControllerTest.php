<?php

namespace Hexmedia\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase {

	public function testDisplay() {
		$client = static::createClient();

		$crawler = $client->request('GET', '/groups/list');
	}

	public function testEdit() {
		$client = static::createClient();

		$crawler = $client->request('GET', '/groups/list');
	}

}
