<?php

use yii\db\Migration;

/**
 * Handles the creation of table `security`.
 */
class m170909_080040_create_security_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('security', [
            'id' => $this->primaryKey(),
            'ip' => $this->string()->notNull(),
            'count' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('security');
    }
}
