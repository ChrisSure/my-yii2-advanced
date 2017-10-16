<?php
namespace frontend\logic\form\auth;

use Yii;
use yii\base\Model;
use common\logic\entities\auth\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\logic\entities\auth\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => \Yii::t('app', 'No user with this email address')
            ],
        ];
    }

}
