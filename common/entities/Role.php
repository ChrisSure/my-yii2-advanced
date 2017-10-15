<?php

namespace common\entities;

use Yii;
use yii\db\ActiveRecord;


class Role extends ActiveRecord
{
    
    public static function tableName()
    {
        return 'auth_item';
    }
    
    
    public static function roleList()
    {
		$res = self::find()->select('name')->asArray()->all();
		foreach ($res as $key => $value) {
			$arr[$value['name']] = $value['name'];
		}
		return $arr;
	}
    
    
}
