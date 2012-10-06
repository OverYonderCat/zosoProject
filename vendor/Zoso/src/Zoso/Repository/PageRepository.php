<?php

namespace Zoso\Repository;

class PageRepository extends BaseRepository
{
	
	public function fetchBySlug($slug)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page', 'blocks', 'fields', 'blocktype', 'fieldtype')
		   ->from('Zoso\Entity\Page', 'page')
		   ->leftJoin('page.blocks', 'blocks')
		   ->leftJoin('blocks.fields', 'fields')
		   ->leftJoin('blocks.blocktype', 'blocktype')
		   ->leftJoin('fields.fieldtype', 'fieldtype')
		   ->where($qb->expr()->eq('page.slug', ':slug'))
		   ->setParameter('slug', $slug);
		
		$query = $qb->getQuery();
		$result = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
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
	
	public function fetchChildrenById($parentid)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page')
			->from('Zoso\Entity\Page', 'page')
			->where($qb->expr()->eq('page.parent', ':parentid'))
			->setParameter('parentid', $parentid);
		$query = $qb->getQuery();
		return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
	}
	
}