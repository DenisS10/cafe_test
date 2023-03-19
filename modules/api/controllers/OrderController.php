<?php

namespace app\modules\api\controllers;

use ApiBaseController;
use app\models\MenuOrder;
use app\models\Order;
use yii\web\Response;


class OrderController extends ApiBaseController
{
    public function behaviors(): array
    {
//        return array_merge(parent::behaviors(), 'auth behaviour');
        return parent::behaviors();
    }

    public function actionCreate(): null|Order
    {
        $this->enableCsrfValidation = false;
        $order = new Order();
        $order->table_number = \Yii::$app->request->post('table_number');
        if($order->save()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $this->response->setStatusCode(201);
            return $order;
        }
        return null;
    }

    public function actionAddPosition(): MenuOrder|bool
    {
        return MenuOrder::addPosition();
    }

    public function actionRemovePosition(): void
    {
        if(MenuOrder::removePosition()) {
            $this->response->setStatusCode(200);
        }
    }

    public function actionCloseOrder()
    {
        // to be continued...  I didn't see this in task :)
    }
}
