<?php

namespace App\Items;

/**
 * 
 */
class Item
{
	protected $item;

	public function __construct($item)
	{
		$this->item = $item;
	}
}