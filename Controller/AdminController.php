<?php

namespace Hexmedia\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hexmedia\AdministratorBundle\ControllerInterface\ListController as ListControllerInterface;
use Hexmedia\UserBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController as RestController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Hexmedia\UserBundle\Form\UserType;
use Hexmedia\AdministratorBundle\ControllerInterface\BreadcrumbsInterface;

class AdminController extends RestController implements ListControllerInterface, BreadcrumbsInterface {

	/**
	 * @var WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs
	 */
	private $breadcrumbs;

	/**
	 *
	 * @return WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs
	 */
	public function registerBreadcrubms() {
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");

		$this->breadcrumbs->addItem("Administrators", $this->get('router')->generate('HexMediaAdmin'));

		return $this->breadcrumbs;
	}

	/**
	 *
	 * @Rest/View
	 */
	public function addAction() {
		return array();
	}

	/**
	 * @Template()
	 */
	public function editAction($id) {
		$this->registerBreadcrubms()
			->addItem("Edit");

		$em = $this->getDoctrine()->getManager();
		/**
		 * @var Hexmedia\UserBundle\Repository\UserRepository
		 */
		$repository = $em->getRepository('HexmediaUserBundle:User');

		$user = $repository->findOneById($id);

		$form = $this->createForm(new UserType(), $user);

		if ($form instanceof \Symfony\Component\Form\Form)
			;

		$form->handleRequest($this->getRequest());

		if ($form->isValid()) {
			$user = $form->getData();

			$em->persist($user);

			$em->flush();
		}

		return array('form' => $form->createView());
	}

	/**
	 * @Rest\View
	 */
	public function listAction($page = 1, $pageSize = 10, $sort = 'id', $sortDirection = "ASC") {
		$this->registerBreadcrubms();
		$em = $this->getDoctrine()->getManager();
		/**
		 * @var Hexmedia\UserBundle\Repository\UserRepository
		 */
		$repository = $em->getRepository('HexmediaUserBundle:User');

		$items = $repository->getPage($page, $sort, $pageSize, $sortDirection);
		$itemsCount = $repository->getCount();

		$arr = array(
			"items" => array(),
			"itemsCount" => $itemsCount
		);

		$i = ($page - 1) * $pageSize + 1;
		foreach ($items as $item) {
			$arr['items'][] = array(
				'id' => $item->get('id'),
				'number' => $i,
				'email' => $item->get('email'),
				'lastLogin' => ($item->get('lastLogin') ? $item->get('lastLogin')->format("Y-m-d H:i:s") : $this->get('translator')->trans('Never')),
				'locked' => $item->get('locked')
			);
		}

		if ($this->getRequest()->getRequestFormat() != 'html') {
			return $arr;
		} else {
			return array();
		}
	}

	/**
	 * @param int $id
	 *
	 * @Rest\View
	 */
	public function removeAction($id) {
		$em = $this->getDoctrine()->getManager();

		$repository = $em->getRepository('HexmediaUserBundle:User');

		$user = $repository->findOneById($id);
		$curUser = $this->get('security.context')->getToken()->getUser();

		if (!$user instanceof User) {
			throw new NotFoundHttpException('User not found');
		}

		if ($user->getId() == $curUser->getID()) {
			throw new UnauthorizedHttpException("", "You can't remove yourself.");
		}

		foreach ($user->getRoles() as $role) {
			switch ($role) {
				case "ROLE_ADMIN":
					if (!$this->get('security.context')->isGranted("ROLE_SUPER_ADMIN")) {
						throw new UnauthorizedHttpException("", "Can't remove user with the same role.");
					}
					break;
				case "ROLE_SUPERDAMIN":
					if (!$this->get('security.context')->isGranted("ROLE_ROOT")) {
						throw new UnauthorizedHttpException("", "Can't remove user with the same role.");
					}
					break;
				case "ROLE_ROOT":
					throw new UnauthorizedHttpException("", "Can't remove root user");
			}
		}

		$em->remove($user);
		$em->flush();

		return array('success' => true);
	}

}

