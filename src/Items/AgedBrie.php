<?php

namespace App\Items;

/**
 * This class encapsulates and represents the AgeBare items.
 */

class AgedBrie extends Item
{
	public function compute()
	{
        $this->item->sellIn -= 1;

        if ($this->item->quality >= 50) return;

        $this->item->quality += 1;


        if ($this->item->sellIn <= 0 && $this->item->quality < 50) {
            $this->item->quality += 1;
        }
	}
}