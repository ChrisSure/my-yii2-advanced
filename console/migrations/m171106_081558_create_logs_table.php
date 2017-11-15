<?php

use yii\db\Migration;

/**
 * Handles the creation of table `logs`.
 */
class m171106_081558_create_logs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('logs', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'file' => $this->string()->notNull(),
            'level' => $this->smallInteger(1)->defaultValue(1),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('logs');
    }
}
