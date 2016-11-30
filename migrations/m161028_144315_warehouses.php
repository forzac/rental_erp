<?php

use yii\db\Migration;

class m161028_144315_warehouses extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%warehouse}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'company_id' => $this->integer(),
            'sort' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx_company_id', '{{%warehouse}}', 'company_id');

        $this->insert('{{%warehouse}}', ['name' => 'Склад большой', 'company_id' => 1]);
        $this->insert('{{%warehouse}}', ['name' => 'Склад маленький', 'company_id' => 1]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%warehouse}}');
    }

}
