<?php

namespace backend\logic\form;

use yii\base\Model;
use common\entities\Pages;
use common\validator\SlugValidator;
use yii\helpers\ArrayHelper;

/**
 * @property MetaForm $meta;
 */
class PagesForm extends Model
{
	public $name;
    public $slug;
    public $text;
    public $title;
    public $description;
    public $keywords;
    public $status;

    private $_page;

    public function __construct(Pages $page = null)
    {
        if ($page) {
            $this->name = $page->name;
            $this->slug = $page->slug;
            $this->text = $page->text;
            $this->title = $page->title;
            $this->description = $page->description;
            $this->keywords = $page->keywords;
            $this->status = $page->status;
            $this->_page = $page;
        }
    }

    public function rules()
    {
        return [
            [['slug', 'name'], 'required'],
            [['description', 'keywords', 'text'], 'string'],
            [['status'], 'integer'],
            [['slug', 'title', 'name'], 'string', 'max' => 255],
            ['slug', SlugValidator::class],
            [['name', 'slug'], 'unique', 'targetClass' => Pages::class, 'filter' => $this->_page ? ['<>', 'id', $this->_page->id] : null]
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Ссилка',
            'name' => 'Ім\'я',
            'description' => 'Опис',
            'keywords' => 'Ключові слова',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'status' => 'Показати',
            'sort' => 'Сортування',
            'created_at' => 'Створено в',
            'updated_at' => 'Обновлено в',
        ];
    }
    

}