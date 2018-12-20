<?php

use yii\db\Migration;

/**
 * Handles the creation of table `minerals_mine`.
 */
class m181219_185525_create_minerals_mine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('minerals_mine', [
            'id' => $this->primaryKey(),
            'mine_id' => $this->integer()->notNull(),
            'mineral_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_minerals_mine_mines', 'minerals_mine', ['mine_id'],
            'mines', ['id']);
        $this->addForeignKey('fk_minerals_mine_minerals', 'minerals_mine', ['mineral_id'],
            'minerals', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_minerals_mine_mines', 'minerals_mine');
        $this->dropForeignKey('fk_minerals_mine_minerals', 'minerals_mine');
        $this->dropIndex('fk_minerals_mine_mines', 'minerals_mine');
        $this->dropIndex('fk_minerals_mine_minerals', 'minerals_mine');

        $this->dropTable('minerals_mine');

        return true;
    }
}
