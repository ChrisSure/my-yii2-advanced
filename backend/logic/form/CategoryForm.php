<?php

namespace backend\logic\form;

use yii\base\Model;
use common\entities\Category;
use common\validator\SlugValidator;
use yii\helpers\ArrayHelper;

/**
 * @property MetaForm $meta;
 */
class CategoryForm extends Model
{
	public $name;
    public $slug;
    public $title;
    public $description;
    public $keywords;
    public $parentId;

    private $_category;

    public function __construct(Category $category = null)
    {
        if ($category) {
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->title = $category->title;
            $this->description = $category->description;
            $this->keywords = $category->keywords;
            $this->parentId = $category->parent ? $category->parent->id : null;
            $this->_category = $category;
        }
    }

    public function rules(): array
    {
        return [
            [['slug', 'name'], 'required'],
            [['parentId'], 'integer'],
            [['name', 'slug', 'title'], 'string', 'max' => 255],
            [['description', 'keywords'], 'string'],
            ['slug', SlugValidator::class],
            [['name', 'slug'], 'unique', 'targetClass' => Category::class, 'filter' => $this->_category ? ['<>', 'id', $this->_category->id] : null]
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
        	'parentId' => 'Батьківська категорія',
        	'name' => 'Назва',
            'slug' => 'Ссилка',
            'title' => 'Заголовок',
            'description' => 'Опис',
            'keywords' => 'Ключові слова',
        ];
    }
    

    public function parentCategoriesList($id): array
    {
        return ArrayHelper::map(Category::find()->orderBy('lft')->asArray()->all(), 'id', function (array $category) {
			return ($category['depth'] > 1 ? str_repeat('-- ', $category['depth'] - 1) . ' ' : '') . $category['name'];
        });
    }
    

}