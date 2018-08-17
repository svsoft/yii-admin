<?php
namespace svsoft\yii\admin\components;

use yii\base\BaseObject;

class Menu extends BaseObject
{
    /**
     * @var MenuItem[]|[]
     */
    public $items = [];

    function init()
    {
        foreach($this->items as $key=>$item)
        {
            if (empty($item['class']))
                $item['class'] = MenuItem::class;

            $this->items[$key] = \Yii::createObject($item);
        }

        parent::init();
    }

    /**
     * @param $url
     * @param $label
     * @param array $config
     *
     * @return MenuItem
     */
    function addItem($url, $label, $config = [])
    {
        return $this->items[] = new MenuItem(['label'=>$label, 'url'=>$url]);
    }

    /**
     * @return MenuItem[]
     */
    function getItems()
    {
        return $this->menu->getItems();
    }


}