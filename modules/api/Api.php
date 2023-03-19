<?php

namespace app\modules\api;

/**
 * api module definition class
 */
class Api extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::configure($this, require(__DIR__ . '/config/main.php'));
        \Yii::$app->user->enableSession = false;
        parent::init();
    }
}
