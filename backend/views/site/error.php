<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$this->context->layout = 'error';
$this->title = $name;
?>
<div class="container" style="padding-top: 20px;">
	<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  		<h3><?= $name ?></h3>
        <p>
            <?= nl2br(Html::encode($message)) ?>
        </p>
	</div>
	<a href="<?=\Yii::$app->urlManager->hostInfo;?>"><b>На сайт</b></a>
</div>
    