<?php

namespace Hexmedia\UserBundle\Menu;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Hexmedia\AdministratorBundle\Menu\Subscriber as SubscriberAbstract;
use Hexmedia\AdministratorBundle\Menu\Builder as MenuBuilder;
use Hexmedia\AdministratorBundle\Menu\Event as MenuEvent;

class Subscriber extends SubscriberAbstract implements EventSubscriberInterface {

	public function addPositions(MenuEvent $event) {
		$users = $event->getMenu()->addChild($this->translator->trans("Users"), array('route' => 'HexMediaAdmin', 'id' => 'HexMediaAdmin'));
//		$users->addChild($this->translator->trans("List"), array('route' => 'HexMediaAdmin', 'id' => 'HexMediaAdmin'));
		$users->addChild($this->translator->trans("Add"), array('route' => 'HexMediaAdminAdd', 'id' => 'HexMediaAdminAdd'));

//
//		$menuBuildier->addMethodCall('addChild', array("Administrators", 99, array('route' => 'HexMediaAdmin', 'id' => 'HexMediaAdmin')));
//		$menuBuildier->addMethodCall('addChild', array("List", 1, array('route' => 'HexMediaAdmin', 'under' => 'HexMediaAdmin')));
////		$menuBuildier->addMethodCall('addChild', array("Groups", 2, array('route' => 'HexMediaGroups', 'under' => 'HexMediaAdmin')));
//		$menuBuildier->addMethodCall('addChild', array("Add", 3, array('route' => 'HexMediaAdminAdd', 'under' => 'HexMediaAdmin')));
//
//		$menuBuildier->addMethodCall('addChild', array('Users', 50, array('route' => 'HexMediaUserDisplay')));
	}

	public static function getSubscribedEvents() {
		return array(
			MenuBuilder::MENU_BUILD_EVENT => array('addPositions', 1)
		);
	}

}

?>
