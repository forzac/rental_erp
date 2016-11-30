<?php

use yii\db\Migration;

class m161030_094225_product_quantity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_quantity}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->string(),
            'warehouse_id' => $this->integer(),
            'quantity' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->insert('{{%product_quantity}}', ['product_id' => 1, 'warehouse_id' => 1, 'quantity' => 3 ] );
        $this->insert('{{%product_quantity}}', ['product_id' => 1, 'warehouse_id' => 2, 'quantity' => 6 ] );
        $this->insert('{{%product_quantity}}', ['product_id' => 2, 'warehouse_id' => 1, 'quantity' => 2 ] );
        $this->insert('{{%product_quantity}}', ['product_id' => 2, 'warehouse_id' => 2, 'quantity' => 3 ] );

    }

    public function safeDown()
    {
        $this->dropTable('{{%product_quantity}}');
    }

}
