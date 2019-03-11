<?php

namespace svsoft\yii\admin;

use svsoft\yii\admin\components\Menu;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * Class AdminModule
 * @package svsoft\yii\admin
 *
 * @property Menu $menu
 */
class AdminModule extends Module
{
    public $layout = 'main.php';

    public $useModuleAuthorize = true;

    public $accessRule = [];


    public function __construct($id, Module $parent = null, array $config = [])
    {
        $this->accessRule = [
            'allow' => true,
            'roles' => ['@'],
        ];

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'class'=>AccessRule::class,
                        'controllers' => [ $this->id . '/login'],
                        'allow' => true,
                    ],
                    $this->accessRule,
                ],
            ],

        ];
    }

    private function configureGii()
    {
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
    }
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->configureGii();

        if (!$this->has('menu'))
        {
            $this->set('menu',[
                'class'=>Menu::class,
            ]);
        }

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
     * @return null|object|Menu
     * @throws \yii\base\InvalidConfigException
     */
    public function getMenu()
    {
        return $this->get('menu');
    }
}
