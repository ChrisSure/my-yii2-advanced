<?php

namespace common\logic\entities\auth;

use Webmozart\Assert\Assert;
use yii\db\ActiveRecord;

/**
 * @property integer $user_id
 * @property string $identity
 * @property string $network
 */
class Network extends ActiveRecord
{
    public static function create($network, $identity)
    {
    	if(!$network || !$identity)
    		throw new \yii\web\HttpException(404, 'No network || identity');
    	
        $item = new static();
        $item->network = $network;
        $item->identity = $identity;
        return $item;
    }

    public function isFor($network, $identity)
    {
        return $this->network === $network && $this->identity === $identity;
    }

    public static function tableName()
    {
        return '{{%user_network}}';
    }
}