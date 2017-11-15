<?php

namespace backend\logic\form\system;

use yii\base\Model;
use common\logic\entities\system\Security;
use yii\helpers\ArrayHelper;



class SecurityForm extends Model
{
	public $ip;
    private $_security;

    public function __construct(Security $security = null)
    {
        if ($security) {
            $this->ip = $security->ip;
            $this->_security = $security;
        }
    }

    public function rules()
    {
        return [
            ['ip', 'string', 'max' => 255],
            ['ip', 'unique', 'targetClass' => Security::class, 'filter' => $this->_security ? ['<>', 'id', $this->_security->id] : null]
        ];
    }

    public function attributeLabels()
    {
        return [
            'ip' => 'IP',
            'created_at' => 'Створено в',
            'updated_at' => 'Обновлено в',
        ];
    }
	
}