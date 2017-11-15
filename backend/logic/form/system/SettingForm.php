<?php

namespace backend\logic\form\system;

use yii\base\Model;
use common\logic\entities\system\Setting;
use yii\helpers\ArrayHelper;



class SettingForm extends Model
{
	public $title;
    public $description;
    public $keywords;
    public $address;
    public $phone;
    public $email;
    

    public function __construct(Setting $setting = null)
    {
        if ($setting) {
            $this->title = $setting->title;
            $this->description = $setting->description;
            $this->keywords = $setting->keywords;
            $this->address = $setting->address;
            $this->phone = $setting->phone;
            $this->email = $setting->email;
        }
    }

    public function rules()
    {
        return [
            [['description', 'keywords'], 'string'],
            ['email', 'email'],
            [['title', 'address', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }
	
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Опис',
            'keywords' => 'Ключові слова',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'email' => 'Email',
            'created_at' => 'Створено в',
            'updated_at' => 'Обновлено в',
        ];
    }  
	
}