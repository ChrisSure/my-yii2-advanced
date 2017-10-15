<?php
use yii\helpers\Html;
$resetLink = \Yii::$app->urlManager->createAbsoluteUrl(['auth/confirm-user', 'token' => $user->password_reset_token]);
?>
<img src="<?= $message->embed($logo); ?>" />
<hr/>

<div class="password-reset">
    <p>Привіт <?= Html::encode($user->username) ?></p>

    <p>Перейдіть по посиланню, щоб завершити реєстрацію</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>