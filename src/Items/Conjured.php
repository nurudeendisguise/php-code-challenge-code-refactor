<?php

namespace App\Items;

use App\Interfaces\ItemInterface;

/**
 * This class encapsulates and represents the Conjured items.
 * 
 */

class Conjured extends Item implements ItemInterface
{
	public function compute()
	{
        $this->item->sellIn -= 1;

        if ($this->item->quality <= 0 ) {
            return;
        }

        $this->item->quality -= 2;

        if ($this->item->sellIn <= 0) {
            $this->item->quality -= 2;
        }
	}
}