<?php

namespace App\Items;
use App\Interfaces\ItemInterface;

/**
 * This class encapsulates and represents the BackStagePasses items.
 */

class BackStagePasses extends Item implements ItemInterface
{
	public function compute()
	{
        $this->item->sellIn -= 1;

        if ($this->item->quality >= 50) return;

        if ($this->item->sellIn < 0) {
            return $this->item->quality = 0;
        }

        $this->item->quality += 1;

        if ($this->item->sellIn < 10) {
            $this->item->quality += 1;
        }

        if ($this->item->sellIn < 5) {
            $this->item->quality += 1;
        }
	}
}