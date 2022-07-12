<?php

namespace App;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {

            switch ($item->name) {
                case 'normal':
                    return $this->normalItem($item);
                    break;

                case 'Aged Brie':
                    return $this->brieItem($item);
                    break;

                case 'Sulfuras, Hand of Ragnaros':
                    return;
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    return $this->backstagePassesItem($item);

                case 'Conjured Mana Cake':
                    return $this->conjuredItem($item);
            }

        }
    }


    public function normalItem($item)
    {
        $item->sellIn -= 1;

        if ($item->quality == 0) return;

        $item->quality -= 1;

        if ($item->sellIn <= 0) {
            $item->quality -= 1;
        }
    }

    public function brieItem($item)
    {
        $item->sellIn -= 1;

        if ($item->quality >= 50) return;

        $item->quality += 1;


        if ($item->sellIn <= 0 && $item->quality < 50) {
            $item->quality += 1;
        }
        
    }

    public function backstagePassesItem($item)
    {
        $item->sellIn -= 1;

        if ($item->quality >= 50) return;

        if ($item->sellIn < 0) {
            return $item->quality = 0;
        }

        $item->quality += 1;

        if ($item->sellIn < 10) {
            $item->quality += 1;
        }

        if ($item->sellIn < 5) {
            $item->quality += 1;
        }
    }

    public function conjuredItem($item)
    {
        $item->sellIn -= 1;

        if ($item->quality <= 0 ) {
            return;
        }

        $item->quality -= 2;

        if ($item->sellIn <= 0) {
            $item->quality -= 2;
        }
    }
}
