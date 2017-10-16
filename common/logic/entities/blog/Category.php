<?php

namespace common\logic\entities\blog;

use Yii;
use paulzi\nestedsets\NestedSetsBehavior;
use common\logic\entities\queries\CategoryQuery;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 */
class Category extends \yii\db\ActiveRecord
{
    
    public function behaviors(): array
    {
        return [
            NestedSetsBehavior::className(),
        ];
    }
    
    
    public static function tableName()
    {
        return 'category';
    }
    
    
    public static function create($name, $slug, $title, $description, $keywords)
    {
        $category = new static();
        $category->name = $name;
        $category->slug = $slug;
        $category->title = $title;
        $category->description = $description;
        $category->keywords = $keywords;
        return $category;
    }

    public function edit($name, $slug, $title, $description, $keywords)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }
    
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Ссилка',
            'name' => 'Ім\'я',
            'title' => 'Заголовок',
            'description' => 'Опис',
            'keywords' => 'Ключові слова',
        ];
    }
    
    
    public function transactions(): array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
    
    
    public static function find()
    {
        return new CategoryQuery(static::class);
    }
    
}
