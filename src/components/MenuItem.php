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
    protected $items = [];

    function __construct($url, $label, $config = [])
    {
        $this->url = $url;
        $this->label = $label;

        parent::__construct($config);
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
        $item = new MenuItem($url, $label, $config);
        $this->items[] = $item;

        return $item;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setVisible($value)
    {
        $this->visible = $value;

        return $this;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setIcon($value)
    {
        $this->icon = $value;

        return $this;
    }

    /**
     * @return MenuItem[]
     */
    function getItems()
    {
        return $this->items;
    }

}