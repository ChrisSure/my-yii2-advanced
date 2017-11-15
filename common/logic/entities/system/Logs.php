<?php
namespace common\logic\entities\system;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Logs extends ActiveRecord
{
	
	public static function tableName(){
        return '{{logs}}';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                ],
            ],
        ];
    }
    
    
    public function rules()
    {
        return [
        	['text', 'string'],
        	['file', 'string', 'max' => 255],
        	['level', 'integer'],
           	['created_at', 'safe']
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
            'text' => 'Текст',
            'file' => 'Файл',
            'level' => 'Рівень',
            'created_at' => 'Створено в'
        ];
    }
    
    
    public static function add($text, $file, $level)
    {
		$logs = new self();
		$logs->text = $text;
		$logs->file = $file;
		$logs->level = $level;
		if (!$logs->save()) {
			throw new \RuntimeException('Error save logs.');
		}
	}
    
}
