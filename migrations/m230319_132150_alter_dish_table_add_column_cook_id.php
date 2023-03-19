<?php

use yii\db\Migration;

/**
 * Class m230319_132132_alter_dishes_table_add_column_cook_id
 */
class m230319_132150_alter_dish_table_add_column_cook_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%dish}}',
            'cook_id',
            $this->integer()
        );

        $this->addForeignKey(
            'dish_cook_id_cook_t_id_fkey',
            '{{%dish}}',
            'cook_id',
            'cook',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('dish_cook_id_cook_t_id_fkey', '{{%dish}}');
        $this->dropColumn('{{%dish}}', 'cook_id');
    }
}
