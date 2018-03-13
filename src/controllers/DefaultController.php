<?php

namespace svsoft\yii\admin\controllers;

use svsoft\yii\admin\AdminModule;
use yii\web\Controller;

/**
 * Default controller for the `admin2` module
 *
 * @property AdminModule $module
 *
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
