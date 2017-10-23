<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m170909_080043_add_user_table extends Migration
{
	
	public function up()
    {
		$this->insert('{{%user}}', array(
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
        
    }
	
}
