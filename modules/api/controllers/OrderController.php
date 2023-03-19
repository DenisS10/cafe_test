<?php

namespace app\modules\api\controllers;

use app\models\Order;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    public $modelClass = Order::class;

}
