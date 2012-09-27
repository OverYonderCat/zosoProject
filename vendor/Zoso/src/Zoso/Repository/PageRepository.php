<?php

namespace Zoso\Repository;

class PageRepository extends BaseRepository
{
	
	public function fetchBySlug($slug)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page')
		   ->from('Zoso\Entity\Page', 'page')
		   ->where('page.slug = :slug')
		   ->setParameter('slug', $slug);
		$query = $qb->getQuery();
		$result = $query->getResult();
		if(empty($result)) {
			return null;
		}
		return $result[0];
	}
	
}