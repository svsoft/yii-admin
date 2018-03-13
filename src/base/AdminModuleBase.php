<?php
namespace svsoft\yii\admin\base;

use yii\base\Module;
use yii\filters\AccessControl;

class AdminModuleBase extends Module
{

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
                    ],
                ],
            ],
        ];
    }

}