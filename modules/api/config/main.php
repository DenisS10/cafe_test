<?php

return [
    'components' => [
        'response' => [
            'format'=>'json',
            'class' => 'yii\web\Response',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'rules' => [
            ],
        ]
    ]
];
