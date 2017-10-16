<?php

namespace common\logic\entities\auth;

use Yii;
use yii\db\ActiveRecord;


class AuthAssign extends ActiveRecord
{
    
    public static function tableName()
    {
        return 'auth_assignment';
    }
    
    
}