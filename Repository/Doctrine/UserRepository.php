<?php

namespace Hexmedia\UserBundle\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Hexmedia\UserBundle\Repository\UserRepositoryInterface;
use Hexmedia\AdministratorBundle\Repository\Doctrine\ListTrait;

class UserRepository extends EntityRepository implements UserRepositoryInterface {

	use ListTrait;

}

?>
