<?php

namespace Zoso\Block;

use Zoso\Entity\Block as Entity;

interface BlockInterface
{
	public function setEntity(Entity $entity);
	public function getEntity();
	public function getHtml();
}