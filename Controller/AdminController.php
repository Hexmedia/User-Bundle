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
use Hexmedia\UserBundle\Form\Type\User\EditType;
use Hexmedia\AdministratorBundle\ControllerInterface\BreadcrumbsInterface;

use Hexmedia\AdministratorBundle\Controller\CrudController;


class AdminController extends CrudController
{

	/**
	 *
	 * @return \WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs
	 */
	public function registerBreadcrubms()
	{
		$this->breadcrumbs = $this->get("white_october_breadcrumbs");

		$this->breadcrumbs->addItem("Administrators", $this->get('router')->generate('HexMediaAdmin'));

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
        return "HexmediaUserBundle:Admin";
    }

    public function getEntityName() {
        return "User";
    }

    public function getNewEntity() {
        return new User();
    }

    public function getRepository() {
        return $this->getDoctrine()->getRepository("HexmediaUserBundle:User");
    }

}

