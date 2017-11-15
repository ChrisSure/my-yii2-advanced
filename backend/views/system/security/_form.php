<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\logic\entities\system\Security */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
	<div class="box-body">
	    <?php $form = ActiveForm::begin(); ?>
		    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
		    <div class="form-group">
				<?= Html::submitButton('Зберегти', ['class' => 'btn btn-success', 'name' => 'security-button']) ?>
			</div>
	    <?php ActiveForm::end(); ?>
	</div>
</div>
