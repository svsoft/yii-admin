<?php
namespace svsoft\yii\admin\components;

use yii\base\Component;


class MenuItem extends Component
{
    public $url;

    public $label;

    public $visible;

    public $icon;

    /**
     * @var MenuItem[]
     */
    protected $items;

    function __construct($url, $label, $config = [])
    {
        $this->url = $url;
        $this->label = $label;

        parent::__construct($config);
    }

    function addItem($url, $label, $config = [])
    {
        $item = new MenuItem($url, $label, $config);
        $this->items[] = $item;

        return $item;
    }

    public function setVisible($value)
    {
        $this->visible = $value;

        return $this;
    }

    public function setIcon($value)
    {
        $this->icon = $value;

        return $this;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    function getItems()
    {
        return $this->items;
    }

}