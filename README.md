Yii2-backup
===================
Administration module for Yii2. In developing! <br />

Installation
---


add to config file

Подключение модуля в конфиге
'modules'=>[
    'admin'=>'svsoft\yii\admin\AdminModule'
];


gii переносится в модуль admin, для этого добавить строкив в место обычного подключения  модуля gii

$config['bootstrap'][] = 'admin/gii';
$config['modules']['admin']['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'],
];

