<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * This is the model class for table "cook".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $phone
 *
 * @property Dish[] $dishes
 */
class Cook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'cook';
    }

    public static function getPopular(int $limit = 1): array
    {
        // select cook_id, d.name, c.name, c.surname,
        //       count(dish_id) as dish_id_count from menu
        //                                       left join dish d on menu.dish_id = d.id
        //                                       inner join cook c on d.cook_id = c.id
        //                                       group by dish_id order by dish_id_count desc
        return static::find()
            ->select(new Expression('cook_id, d.name, c.name, c.surname, count(dish_id) as dish_id_count'))
            ->leftJoin('dish', 'menu.dish_id = dish.id')
            ->innerJoin('cook', 'dish.id = cook.id')
            ->groupBy('dish_id')
            ->orderBy(['dish_id_count' => SORT_DESC])
            ->limit($limit)
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Dishes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishes(): ActiveQuery
    {
        return $this->hasMany(Dish::class, ['cook_id' => 'id']);
    }
}
