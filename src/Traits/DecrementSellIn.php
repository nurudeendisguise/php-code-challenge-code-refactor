<?php

namespace App\Traits;

trait DecrementSellIn {

	protected function reduceSellIn()
	{
		$this->item->sellIn -= 1;
	}

}