<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property float|null $amount
 * @property int|null $table_number
 * @property string|null $description
 *
 * @property Menu $menu
 * @property MenuOrder[] $menuOrders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['table_number'], 'integer'],
            [['amount'], 'number'],
            [['table_number'], 'required'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'table_number' => 'Table Number',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[MenuOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuOrders()
    {
        return $this->hasMany(MenuOrder::class, ['order_id' => 'id']);
    }

    public function getPopularOrder()
    {

    }
}
