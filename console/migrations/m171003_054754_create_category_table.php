<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m171003_054754_create_category_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-category-slug}}', '{{%category}}', 'slug', true);

        $this->insert('{{%category}}', [
            'id' => 1,
            'slug' => 'root',
            'name' => '',
            'title' => null,
            'description' => null,
            'keywords' => null,
            'lft' => 1,
            'rgt' => 2,
            'depth' => 0,
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
