<?php

namespace svsoft\yii\admin;

use svsoft\yii\admin\base\AdminModuleBase;
use svsoft\yii\admin\components\Menu;

/**
 * Class AdminModule
 * @package svsoft\yii\admin
 *
 * @property Menu $menu
 */
class AdminModule extends AdminModuleBase
{

    public $layout = 'main.php';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Добавляем шаблон для crud в gii
        $gii = $this->getModule('gii');

        if (!$gii)
            $gii = \Yii::$app->getModule('gii');

        if ($gii)
        {
            $giiCrudConfig = &$gii->generators['crud'];

            if(empty($giiCrudConfig['class']))
                $giiCrudConfig['class'] = 'yii\gii\generators\crud\Generator';

            $giiCrudConfig['templates']['adminlte'] = $this->basePath . '/gii/templates/crud/simple';
        }

        if (!$this->has('menu'))
            $this->set('menu',[
                'class'=>Menu::class,
            ]);

        // Добавляем контролер мап для элфаиндера
        \Yii::$app->controllerMap['elfinder'] = [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'upload/elfinder',
                'name' => 'Все файлы'
            ]
        ];
    }

    /**
     * @return Menu
     */
    public function getMenu()
    {
        return $this->get('menu');
    }
}
