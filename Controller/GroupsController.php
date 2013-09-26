<?php

namespace Hexmedia\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController as RestController;
use Hexmedia\AdministratorBundle\ControllerInterface\ListController as ListControllerInterface;
use Doctrine\ORM\NoResultException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GroupsController extends RestController implements ListControllerInterface {

	/**
	 * @var \WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs
	 */
	private $breadcrumbs;

	/**
	 *
	 * @return \WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs
	 */
	private function registerBreadcrumbs() {
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");

		$this->breadcrumbs->addItem("Administrators", $this->get('router')->generate('HexMediaAdmin'));
		$this->breadcrumbs->addItem("Groups", $this->get('router')->generate('HexMediaGroups'));

		return $this->breadcrumbs;
	}

	/**
	 *
	 * @Rest\View
	 *
	 * @param int $page
	 * @param int $pageSize
	 * @param string $sort
	 * @param string $sortDirection
	 * @return type
	 */
	public function listAction($page = 1, $pageSize = 10, $sort = 'id', $sortDirection = "ASC") {
		$this->registerBreadcrumbs();

		$em = $this->getDoctrine()->getManager();
		/**
		 * @var \Hexmedia\UserBundle\Repository\UserRepository
		 */
		$repository = $em->getRepository('HexmediaUserBundle:Group');

		try {
			$items = $repository->getPage($page, $sort, $pageSize, $sortDirection);
			$itemsCount = $repository->getCount();
		} catch (NoResultException $e) {
			$items = array();
			$itemsCount = 0;
		}

		$arr = array(
			"items" => array(),
			"itemsCount" => $itemsCount
		);

		$i = ($page - 1) * $pageSize + 1;
		foreach ($items as $item) {
			$arr['items'][] = array(
				'id' => $item->get('id'),
				'number' => $i,
				'name' => $item->get('name'),
			);
		}

		if ($this->getRequest()->getRequestFormat() != 'html') {
			return $arr;
		} else {
			return array();
		}
	}

	public function editAction(Request $request, $name) {
		$this->registerBreadcrumbs()
			->addItem("Edit", $this->get('router')->generate('HexMediaGroupsEdit', array('name' => $name)));

		$response = $this->forward("FOSUserBundle:Group:edit", array('groupName' => $name));

		if ($response->getStatusCode() == 500) {
			//Here should be added alert but bundle is not ready yet.
			return new RedirectResponse($this->container->get('router')->generate("HexMediaGroups"));
		}

		if ($request->isMethod("POST")) {
			if ($response instanceof RedirectResponse) {
				$response->setTargetUrl($this->container->get('router')->generate("HexMediaGroups"));
			}
		}

		return $response;
	}

	public function removeAction($name) {
		$this->forward("FOSUserBundle:Group:delete", array('groupName' => $name))->getContent();
		$response = new RedirectResponse($this->container->get('router')->generate("HexMediaGroups"));
		return $response;
	}

	public function addAction(Request $request) {
		$this->registerBreadcrumbs()
			->addItem("Add", $this->get('router')->generate('HexMediaGroupsAdd'));
		$response = $this->forward("FOSUserBundle:Group:new");

		if ($response->getStatusCode() == 500) {
			//Here should be added alert but bundle is not ready yet.
			return new RedirectResponse($this->container->get('router')->generate("HexMediaGroups"));
		}

		if ($request->isMethod("POST")) {
			if ($response instanceof RedirectResponse) {
				$response->setTargetUrl($this->container->get('router')->generate("HexMediaGroups"));
			}
		}

		return $response;
	}

}
