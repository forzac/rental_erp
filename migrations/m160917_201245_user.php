<?php

use yii\db\Migration;
use app\models\User;

class m160917_201245_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(255),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'phone_main' => $this->string(255),
            'position' => $this->string(255),
            'email' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $tableOptions);

        $user = new User();
        $user->first_name = "Главный";
        $user->last_name = "Админитратор";
        $user->login = 'admin';
        $user->email = 'admin@admin.com';
        $user->setPassword('admin');
        $user->save();

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }

}
