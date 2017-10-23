<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Вітаємо!</h1>
        <p class="lead">Ви успішно встановили Yii2-advanced by Snayper911</p>
        <? if (!\Yii::$app->user->isGuest): ?>
        	<p><?=Yii::$app->user->id;?></p>
        <? endif; ?>
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
</div>