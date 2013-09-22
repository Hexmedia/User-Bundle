<?php

namespace Hexmedia\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User Entity
 *
 * @ORM\Table(name = "user_base")
 * @ORM\Entity(repositoryClass = "Hexmedia\UserBundle\Repository\Doctrine\UserRepository")
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"users_base" = "Hexmedia\UserBundle\Entity\User"})
 */
class User extends BaseUser
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="type", type="string", length=32)
//     */
//    private $type = 'user';
//
//    public function __construct()
//    {
//        parent::__construct();
//    }
//
//    /**
//     * @param mixed $type
//     */
//    public function setType($type)
//    {
//        $this->type = $type;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getType()
//    {
//        return $this->type;
//    }


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

