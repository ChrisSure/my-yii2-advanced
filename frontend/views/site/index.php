<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
	<? 
	foreach($cat as $value): 
		$indent = ($value->depth > 1 ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $value->depth - 1) . ' ' : '');
        echo $indent . Html::a(Html::encode($value->name), ['/category/view', 'id' => $value->id]) . '<br/>';
	endforeach;
	?>
    <div class="jumbotron">
        <h1>Вітаємо!</h1>
        <p class="lead">Ви успішно встановили Yii2-advanced by Snayper911</p>
        <? if (!\Yii::$app->user->isGuest): ?>
        	<p><?=Yii::$app->user->id;?></p>
        <? endif; ?>
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
</div>