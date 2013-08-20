<?php

namespace Hexmedia\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User Entity
 *
 * @ORM\Entity(repositoryClass = "Hexmedia\UserBundle\Repository\Doctrine\UserRepository")
 */
abstract class User extends BaseUser
{

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct()
	{
		parent::__construct();
	}

//	public function getSlug() {
//		return $this->getEmailCanonical();
//	}
//
//	public function setEmail($email) {
//		parent::setUsername($email);
//		parent::setEmail($email);
//	}
//
//	public function setUsername($username) {
//		$this->setEmail($username);
//	}
//
//	public function getUsername() {
//		$this->getEmail();
//	}
//
//	public function getUsernameCanonical() {
//		return $this->getEmailCanonical();
//	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

}

