<?php

namespace Zoso\Repository;

class PageRepository extends BaseRepository
{
	
	public function fetchBySlug($slug)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('page', 'blocks', 'blocktype', 'fields', 'fieldtype')
		   ->from('Zoso\Entity\Page', 'page')
		   ->leftJoin('page.blocks', 'blocks')
		   ->leftJoin('blocks.blocktype', 'blocktype')
		   ->leftJoin('blocktype.fields', 'fields')
		   ->leftJoin('fields.fieldtype' , 'fieldtype')
		   ->where($qb->expr()->eq('page.slug', ':slug'))
		   ->setParameter('slug', $slug);
		$query = $qb->getQuery();
		$result = $query->getResult();//(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		if(empty($result)) {
			return null;
		}
		return $result[0];
	}
	
}