<?php

use yii\db\Migration;

class m161030_075833_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'sort' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->insert('{{%company}}', ['name' => 'Моя компания', 'sort' => 0]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }

}
