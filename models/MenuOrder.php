<?php

namespace app\models;

use Yii;
use yii\web\Response;

/**
 * This is the model class for table "menu_order".
 *
 * @property int|null $menu_id
 * @property int|null $order_id
 *
 * @property Menu $menu
 * @property Order $order
 */
class MenuOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_order';
    }

    public static function removePosition(): int|bool
    {
        $orderId = \Yii::$app->request->post('order_id');
        $menuId = \Yii::$app->request->post('menu_id');
        if (isset($orderId, $menuId)) {
            return MenuOrder::find()
                ->andWhere(['order_id' => $orderId])
                ->andWhere(['menu_id' => $menuId])
                ->one()
                ->delete();
        }
        return false;
    }

    public static function addPosition(): MenuOrder|bool
    {
        $menuOrder = new MenuOrder();
        $menuOrder->menu_id = \Yii::$app->request->post('menu_id');
        $menuOrder->order_id = \Yii::$app->request->post('order_id');
        if ($menuOrder->save()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->response->setStatusCode(201);
            return $menuOrder;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'order_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::class, ['id' => 'menu_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
