<?php
namespace common\logic\entities\security;

use Yii;
use yii\db\ActiveRecord;



class Security extends ActiveRecord
{
	
	public static function tableName(){
        return '{{security}}';
    }
    
    
    public function rules()
    {
        return [
            [['ip', 'count'], 'required'],
            [['created_at', 'updated_at', 'count'], 'integer'],
            [['ip'], 'string', 'max' => 255],
        ];
    }
    
    
    public function attributeLabels()
    {
        return [
            'ip' => 'Ip',
            'created_at' => 'Створено в',
            'updated_at' => 'Обновлено в',
            'count' => 'Кількість невірних спроб',
        ];
    }
    
}
