<?php
use yii\helpers\Html;
?>
<img src="<?= $message->embed($logo); ?>" />
<hr/>

<div class="password-reset">
    <p>Привіт <?= Html::encode($user->username) ?>,</p>

    <p>Ваш новий пароль <?=$password?>:</p>

</div>