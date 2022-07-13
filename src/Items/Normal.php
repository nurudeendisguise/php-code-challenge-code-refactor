<?php

namespace App\Items;

use App\Interfaces\ItemInterface;
use App\Traits\DecrementSellIn;

/**
 * This class encapsulates and represents the normal items.
 */

class Normal extends Item implements ItemInterface
{
    use DecrementSellIn;

	public function compute()
	{
        $this->reduceSellIn();

        if ($this->item->quality == 0) return;

        $this->item->quality -= 1;

        if ($this->item->sellIn <= 0) {
            $this->item->quality -= 1;
        }
	}
}