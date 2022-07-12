<?php

namespace App;

use App\Items\Normal;
use App\Items\AgedBrie;
use App\Items\BackStagePasses;
use App\Items\Conjured;
use App\Items\Sulfuras;


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
                    return (new Normal($item))->compute();
                    break;

                case 'Aged Brie':
                    return (new AgedBrie($item))->compute();
                    break;

                case 'Sulfuras, Hand of Ragnaros':
                    return (new Sulfuras($item))->compute();
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    return (new BackStagePasses($item))->compute();

                case 'Conjured Mana Cake':
                    return (new Conjured($item))->compute();
            }

        }
    }
}
