<?php
use yii\helpers\Html;
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['auth/reset-password', 'token' => $user->password_reset_token]);
?>
<img src="<?= $message->embed($logo); ?>" />
<hr/>

<div class="password-reset">
    <p>Привіт <?= Html::encode($user->username) ?>,</p>

    <p>Перейдіть за посиланням нижче, щоб скинути свій пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
