Yii2-backup
===================
Administration module for Yii2. In developing! <br />

Installation
---


add to config file

$config['bootstrap'][] = 'admin/gii';
$config['modules']['admin']['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'],
];

