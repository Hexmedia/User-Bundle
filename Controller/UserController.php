<?php

namespace Hexmedia\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller {

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

		$this->breadcrumbs->addItem("Users", $this->get('router')->generate('HexMediaUserDisplay'));

		return $this->breadcrumbs;
	}

	/**
	 * @Template()
	 */
	public function displayAction() {
		$this->registerBreadcrumbs();
		return array();
	}

	/**
	 * @Template()
	 */
	public function editAction() {
		$this
			->registerBreadcrumbs()
			->addItem('Edit');

		return array();
	}

}
