<?php
namespace common\logic\entities\system;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;



class Security extends ActiveRecord
{
	
	public static function tableName(){
        return '{{security}}';
    }
    
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
    
    public static function create($ip)
    {
        $security = new static();
        $security->ip = $ip;
        $security->count = 5;
        return $security;
    }
    
    public function edit($ip)
    {
        $this->ip = $ip;
        $this->count = 5;
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
