<?php

namespace Zoso\Repository;

class PageRepository extends BaseRepository
{
	
	public function fetchBySlug($slug)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page')
		   ->from('Zoso\Entity\Page', 'page')
		   ->where($qb->expr()->eq('page.slug', ':slug'))
		   ->setParameter('slug', $slug);
		$query = $qb->getQuery();
		$result = $query->getResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		if(empty($result)) {
			return null;
		}
		return $result[0];
	}
	
	public function fetchNavigationArray()
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page')
			->from('Zoso\Entity\Page', 'page')
			->where($qb->expr()->isNull('page.parent'));
		$query = $qb->getQuery();
		return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
	}
	
}