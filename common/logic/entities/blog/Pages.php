<?php

namespace common\logic\entities\blog;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\logic\repositories\blog\PagesRepository;



class Pages extends ActiveRecord
{
	
	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    
    public static function tableName()
    {
        return 'pages';
    }
    
    
    public static function create($name, $slug, $title, $text, $description, $keywords, $status)
    {
        $page = new static();
        $page->name = $name;
        $page->slug = $slug;
        $page->title = $title;
        $page->text = $text;
        $page->description = $description;
        $page->keywords = $keywords;
        $page->status = $status;
        return $page;
    }
    
    public function edit($name, $slug, $title, $text, $description, $keywords, $status)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->title = $title;
        $this->text = $text;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->status = $status;
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
    
    /**
	* beforeSave для присвоєння номера сортування
	*/
    public function beforeSave($insert)
	{
	    if (parent::beforeSave($insert)) {
	    	if ($this->isNewRecord)
        	{
            	$pageRep = new PagesRepository();
		 		if ($last = $pageRep->lastSort()) {
					$this->sort = $last;
				} else {
					$this->sort = 1;
				}
        	}
		    return true;
		}
	    return false;
	}
	
	/**
	* beforeDelete для переприсвоєння номера сортування
	*/
	public function beforeDelete()
	{
	    if (!parent::beforeDelete()) {
	        return false;
	    }
		$pageRep = new PagesRepository(); 
	    if ($res = $pageRep->getSortPage($this->sort++)) {
			$pageRep->updateAllSort($this->sort);
		}
	    return true;
	}
    
}
