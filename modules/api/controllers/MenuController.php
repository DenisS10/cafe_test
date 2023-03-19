<?php

namespace app\modules\api\controllers;

use app\models\Menu;
use app\models\Order;
use yii\rest\ActiveController;
use yii\web\Controller;


class MenuController extends ActiveController
{
    public $modelClass = Menu::class;
}
