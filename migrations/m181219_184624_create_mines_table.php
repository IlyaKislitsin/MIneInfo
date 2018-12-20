<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mines`.
 */
class m181219_184624_create_mines_table extends Migration
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

        $this->createTable('mines', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'info' => $this->text(),
            'founding_date' => $this->integer(),
            'city_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_mines_cities', 'mines', ['city_id'],
            'cities', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_mines_cities', 'mines');
        $this->dropIndex('fk_mines_cities', 'mines');

        $this->dropTable('mines');

        return true;
    }
}
