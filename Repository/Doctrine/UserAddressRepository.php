<?php

namespace Hexmedia\UserBundle\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Hexmedia\UserBundle\Repository\UserRepositoryInterface;

class UserAddressRepository extends EntityRepository implements UserRepositoryInterface {

	public function getCount() {

	}

	public function getPage($page = 1, $sort = 'id', $pageSize = 10, $sortDirection = 'ASC', $fields = array()) {

	}

}

?>
