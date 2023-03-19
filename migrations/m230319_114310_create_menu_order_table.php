<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu_order}}`.
 */
class m230319_114310_create_menu_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu_order}}', [
            'menu_id' => $this->integer(),
            'order_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'menu_order_menu_id_menu_t_id_fkey',
            '{{%menu_order}}',
            'menu_id',
            '{{%menu}}',
            'id'
        );

        $this->addForeignKey(
            'menu_order_id_order_t_id_fkey',
            '{{%menu_order}}',
            'order_id',
            '{{%order}}',
            'id'
        );

        $this->createIndex(
            'menu_order_order_id_indx',
            '{{%menu_order}}',
            'order_id'
        );

        $this->createIndex(
            'menu_order_menu_id_indx',
            '{{%menu_order}}',
            'menu_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu_order}}');
    }
}
