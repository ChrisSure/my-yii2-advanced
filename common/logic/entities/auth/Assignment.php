<?php

namespace common\logic\entities\auth;

use Yii;
use yii\db\ActiveRecord;

class Assignment extends ActiveRecord
{
	
	public static function tableName()
    {
        return '{{%auth_assignment}}';
    }
    
}
?>