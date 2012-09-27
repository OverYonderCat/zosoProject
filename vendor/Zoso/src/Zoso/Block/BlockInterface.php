<?php

namespace Zoso\Block;

interface BlockInterface
{
	public function setData($blockData);
	public function getData();
	public function getHtml();
}