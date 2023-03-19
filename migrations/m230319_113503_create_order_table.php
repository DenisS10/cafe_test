<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m230319_113503_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(),
            'amount' => $this->double(),
            'table_number' => $this->integer(),
            'description' => $this->string(),
        ]);

        $this->addForeignKey(
            'order_menu_id_menu_t_id_fkey',
            '{{%order}}',
            'menu_id',
            '{{%menu}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
