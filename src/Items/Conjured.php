<?php

namespace App\Items;

/**
 * This class encapsulates and represents the Conjured items.
 * 
 */

class Conjured extends Item
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