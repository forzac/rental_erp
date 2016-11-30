<?php

use yii\db\Migration;

class m161028_124925_category_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category_product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer()->defaultValue(0),
            'sort' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx_parent_id', '{{%category_product}}', 'parent_id');

        $this->insert('{{%category_product}}', ['name' => 'Оборудование', 'parent_id' => 0, 'sort' => 0]);
        $this->insert('{{%category_product}}', ['name' => 'Электрооборудование', 'parent_id' => 1, 'sort' => 1]);
        $this->insert('{{%category_product}}', ['name' => 'Музыкальное оборудование', 'parent_id' => 1, 'sort' => 2]);

    }

    public function down()
    {
        $this->dropTable('{{%category_product}}');
    }

}
