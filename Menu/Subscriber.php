<?php

namespace Hexmedia\UserBundle\Menu;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Hexmedia\AdministratorBundle\Menu\Subscriber as SubscriberAbstract;
use Hexmedia\AdministratorBundle\Menu\Builder as MenuBuilder;
use Hexmedia\AdministratorBundle\Menu\Event as MenuEvent;

class Subscriber extends SubscriberAbstract implements EventSubscriberInterface {

	public function addPositions(MenuEvent $event) {
//		$users = $event->getMenu()->addChild($this->translator->trans("Users"), array('route' => 'HexMediaUser', 'id' => 'HexMediaUser'))->setAttribute('icon', 'icon-user');
	}

	public static function getSubscribedEvents() {
		return array(
			MenuBuilder::MENU_BUILD_EVENT => array('addPositions', 1)
		);
	}
}

?>
