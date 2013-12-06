<?php

namespace Hexmedia\UserBundle\Controller;

use Hexmedia\UserBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use Hexmedia\UserBundle\Form\Type\User\EditType;
use Hexmedia\AdministratorBundle\ControllerInterface\BreadcrumbsInterface;
use Hexmedia\UserBundle\Repository\UserRepositoryInterface;
use Hexmedia\AdministratorBundle\Controller\CrudController;

class AdminUserController extends CrudController
{

	/**
	 * @return BreadcrumbsInterface
	 */
	public function registerBreadcrubms()
	{
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");

		$this->breadcrumbs->addItem("Administrators", $this->get('router')->generate('HexMediaUserUser'));

		return $this->breadcrumbs;
	}

    public function getAddFormType() {
        return null;
    }

    public function getEditFormType() {
        return new EditType();
    }

    public function getRouteName() {
        return "HexMediaUser";
    }

    public function getListTemplate() {
        return "HexmediaUserBundle:AdminUser";
    }

    public function getEntityName() {
        return "User";
    }

    public function getNewEntity() {
        return new User();
    }

    /**
     * @return UserRepositoryInterface
     */
    public function getRepository() {
        return $this->getDoctrine()->getRepository("HexmediaUserBundle:User");
    }

    /**
     * @param int $page
     * @return array
     *
     * @Rest\View
     */
    public function listAction($page = 1) {
        return parent::listAction($page);
    }

}

