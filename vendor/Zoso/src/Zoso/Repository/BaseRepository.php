<?php

namespace Zoso\Repository;

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{
	public function inArray($idArray)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('entity')
		   ->from($this->getEntityName(), 'entity')
		   ->where($qb->expr()->in('entity.id', $idArray));
		$query = $qb->getQuery();
		return $query->getResult();
	}
	
	public function ordered($col, $direction)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('entity')
		   ->from($this->getEntityName(), 'entity')
		   ->orderBy('entity.' . $col, $direction);
		$query = $qb->getQuery();
		return $query->getResult();
	}
}