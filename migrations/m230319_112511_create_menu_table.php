<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m230319_112511_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull()
        ]);

        $this->addForeignKey(
            'menu_dish_id_dish_t_id_fkey',
            '{{%menu}}',
            'dish_id',
            'dish',
            'id',
            'CASCADE',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
