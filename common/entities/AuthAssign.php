<?php

namespace common\entities;

use Yii;
use yii\db\ActiveRecord;


class AuthAssign extends ActiveRecord
{
    
    public static function tableName()
    {
        return 'auth_assignment';
    }
    
    
}