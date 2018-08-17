<?php

namespace svsoft\yii\admin\widgets;

use svsoft\yii\admin\components\BaseAdminModule;
use svsoft\yii\admin\components\MenuItem;
use Yii;

/**
 * Class Menu
 * Theme menu widget.
 */
class Menu extends \dmstr\widgets\Menu
{
    /**
     * @var \svsoft\yii\admin\components\Menu
     */
    protected $menu;


    public function __construct($config = [])
    {
        $this->menu = Yii::$app->getModule('admin')->get('menu');

        parent::__construct($config);
    }

    public function init()
    {
        $this->fillItems($this->menu->items, $this->items);

        parent::init();
    }


    /**
     * Заполняет
     *
     * @param $menuItems MenuItem[]
     * @param $items array
     */
    public function fillItems($menuItems, &$items)
    {
        foreach($menuItems as $menuItem)
        {
            $item = ['label'=>$menuItem->label, 'url'=>$menuItem->url, 'icon'=>$menuItem->icon, 'items'=>[]];

            if ($menuItem->menu)
            {
                $this->fillItems($menuItem->menu->items, $item['items']);
            }

            $items[] = $item;
        }
    }

}
