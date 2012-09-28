<?php

namespace Zoso\Entity;

class BaseEntity
{
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}