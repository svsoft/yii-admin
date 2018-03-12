<?php

namespace svsoft\yii\admin\components;

use yii\filters\AccessControl;
use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Module;

/**
 * content module definition class
 */
class BaseAdminModule extends Module
{
    public $layout = '@svs-admin/views/layouts/main.php';

    public $adminMenu = [];

    public function __construct($id, $parent, $config = [])
    {

        var_dump($this->basePath);die();
        $class = get_class($this);

        $reflectionClass = new \ReflectionClass($class);
        $path = dirname($reflectionClass->getFileName());

        $configFilePath = $path  . '/config/config.php';

        if (file_exists($configFilePath))
        {
            $config = ArrayHelper::merge($config, require ($configFilePath));
        }

        parent::__construct($id, $parent, $config);
    }

    public function init()
    {
        if ($this->layout === null)
        {
            $this->basePath . DIRECTORY_SEPARATOR . 'views/layouts/main.php';
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        //                        'matchCallback' => function ($rule, $action) {
                        //                            return \Yii::$app->user->identity && \Yii::$app->user->identity->isAdmin();
                        //                        }

                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
