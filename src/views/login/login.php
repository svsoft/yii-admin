<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \svsoft\yii\admin\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <b><?=Yii::$app->name?></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Заполните форму входа</p>


        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


        <?= $form->field($model, 'username',[
                'options'=>
                    ['class'=>'form-group has-feedback'],
                'inputOptions' =>
                    ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1'],
                'template'=>"{input}\n<span class=\"glyphicon glyphicon-user form-control-feedback\"></span>\n{hint}\n{error}",
            ]
        );
        ?>

        <?= $form->field($model, 'password', [
            'options'=>[
                'class'=>'form-group has-feedback'],
            'inputOptions' => [
                'class' => 'form-control', 'tabindex' => '2'],
            'template'=>
                "{input}\n<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{hint}\n{error}",

        ])->passwordInput()
        ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <? ActiveForm::end()?>

        <?/*<a href="register.html" class="text-center">Register a new membership</a>*/?>

    </div>
    <!-- /.login-box-body -->
</div>
