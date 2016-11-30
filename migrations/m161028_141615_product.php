<?php

use yii\db\Migration;

class m161028_141615_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'model' => $this->string(),
            'barcode' => $this->string(),
            'category_id' => $this->integer(),
            'image_path' => $this->string(255),
            'image_base_url' => $this->string(255),
            'sort' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx_category_id', '{{%product}}', 'category_id');

        $this->insert('{{%product}}', [ 'name' => 'Микрофон 243',
                                        'model' => 'MS-243',
                                        'barcode' => '23123332',
                                        'category_id' => 3,
                                        'image_path' => '1/zP0cJOUNck9p0yVyG2ZVbIwNLQLItWtK.jpg',
                                        'image_base_url' => '/web/uploads/source',
                                        'sort' => 0]);
        $this->insert('{{%product}}', [ 'name' => 'Колонки Sven Royal',
                                        'model' => 'SN-211-22',
                                        'barcode' => '66655443',
                                        'category_id' => 3,
                                        'image_path' => '1/NeQyORrAhf4eLX8rH1xYJhhjzApsdvmG.jpg',
                                        'image_base_url' => '/web/uploads/source',
                                        'sort' => 0]);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }

}
