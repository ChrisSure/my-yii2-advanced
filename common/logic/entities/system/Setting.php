<?php

namespace common\logic\entities\system;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }
	
	
	public function edit($title, $description, $keywords, $address, $phone, $email)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }
	
}
