<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->insert('{{%user}}', array(
			'id' => 1,
			'email'=>'t@t.ua',
			'username' =>'Taras',
			'password_hash' => '$2y$13$ENYPXWv0Y7HbcMlMtI1nruYUkDfS6H9AvnTiWJm9wP3GjPN9emeOm',
			'auth_key' => 'svrubF8fYXn2i532IqXVh-ilOnhvnp4K',
			'status' => 1,
			'created_at' => 1507802191,
			'updated_at' => 1507802191
		));
        
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
