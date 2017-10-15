<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m170917_063757_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'text' => $this->text(),
            'status' => $this->smallInteger(1)->defaultValue(0),
            'sort' => $this->smallInteger(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('pages');
    }
}
