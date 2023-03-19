<?php

namespace app\modules\api\controllers;

use app\models\MenuOrder;
use app\models\Order;
use yii\web\Controller;
use yii\web\Response;


class OrderController extends Controller
{
    public function actionCreate()
    {
        $this->enableCsrfValidation = false;
        $order = new Order();
        $order->table_number = \Yii::$app->request->post('table_number');
        if($order->save()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $this->response->setStatusCode(201);
            return $order;
        }
    }

    public function actionAddPosition()
    {
        return MenuOrder::addPosition();
    }

    public function actionRemovePosition()
    {
        if(MenuOrder::removePosition()) {
            $this->response->setStatusCode(200);
        }
    }
}
