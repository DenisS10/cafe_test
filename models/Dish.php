<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $cook_id
 *
 * @property Cook $cook
 * @property Menu[] $menus
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['cook_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['cook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cook::class, 'targetAttribute' => ['cook_id' => 'id']],
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
            'description' => 'Description',
            'cook_id' => 'Cook ID',
        ];
    }

    /**
     * Gets query for [[Cook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCook(): ActiveQuery
    {
        return $this->hasOne(Cook::class, ['id' => 'cook_id']);
    }

    /**
     * Gets query for [[Menus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenus(): ActiveQuery
    {
        return $this->hasMany(Menu::class, ['dish_id' => 'id']);
    }
}
