<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int|null $dish_id
 * @property float|null $price
 *
 * @property Dish $dish
 * @property MenuOrder[] $menuOrders
 * @property Order[] $orders
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_id'], 'integer'],
            [['price'], 'number'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::class, 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::class, ['id' => 'dish_id']);
    }

    /**
     * Gets query for [[MenuOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuOrders()
    {
        return $this->hasMany(MenuOrder::class, ['menu_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['menu_id' => 'id']);
    }
}
