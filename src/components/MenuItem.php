<?php
namespace svsoft\yii\admin\components;

use yii\base\BaseObject;


class MenuItem extends BaseObject
{
    public $url;

    public $label;

    public $visible;

    /**
     * @var Menu
     */
    public $menu;

    public $icon;

    /**
     * @var MenuItem[]
     */
    protected $items = [];

    public function init()
    {
        if ($this->menu)
        {
            if (empty($this->menu['class']))
                $this->menu['class'] = Menu::class;

            $this->menu = \Yii::createObject($this->menu);
        }

        parent::init();
    }

}