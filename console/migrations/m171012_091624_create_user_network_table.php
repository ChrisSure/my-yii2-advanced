<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_network`.
 */
class m171012_091624_create_user_network_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_network', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'identity' => $this->string()->notNull(),
            'network' => $this->string(16)->notNull(),
        ]);
        
        $this->createIndex('{{%idx-user_network-identity-name}}', 'user_network', ['identity', 'network'], true);
        $this->addForeignKey('fk-user_network-user', 'user_network', 'id_user', 'user', 'id', 'CASCADE','RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_network');
    }
}
