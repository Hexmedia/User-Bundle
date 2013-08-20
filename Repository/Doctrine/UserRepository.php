<?php

namespace Hexmedia\UserBundle\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Hexmedia\UserBundle\Repository\UserRepositoryInterface;

class UserRepository extends EntityRepository implements UserRepositoryInterface {

	public function getPage($page = 1, $sort = 'id', $pageSize = 10, $sortDirection = 'ASC', $fields = array()) {
		$queryBuilder = $this->createQueryBuilder('u')
			->setMaxResults($pageSize)
			->setFirstResult(max(0, $page - 1) * $pageSize)
			->orderBy('u.' . $sort, $sortDirection == 'ASC' ? 'ASC' : 'DESC')
		;

		return $queryBuilder->getQuery()->getResult();
	}

	public function getCount() {
		$queryBuilder = $this->createQueryBuilder("u")
			->select("count(u.id)");

		return $queryBuilder->getQuery()->getSingleScalarResult();
	}

}

?>
