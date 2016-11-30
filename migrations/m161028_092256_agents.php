<?php

use yii\db\Migration;

class m161028_092256_agents extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%agent}}', [
            'id' => $this->primaryKey(),
            'agent_type' => $this->integer(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'middle_name' => $this->string(255),
            'position' => $this->string(255),
            'phone_main' => $this->string(255),
            'phone_add' => $this->string(255),
            'email' => $this->string(255),
            'service' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%agent}}');
    }

}
