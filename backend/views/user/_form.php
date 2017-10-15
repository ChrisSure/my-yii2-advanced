<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\entities\Role;

/* @var $this yii\web\View */
/* @var $model app\modules\live\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
	<div class="box-body">
	    <?php $form = ActiveForm::begin(); ?>
		    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($model, 'role')->dropDownList(Role::roleList()) ?>
		    <? if ($crud) : ?>
		    	<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
		    <? endif; ?>
		    <?= $form->field($model, 'status')->checkbox() ?>
		    <div class="form-group">
			    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
			</div>
	    <?php ActiveForm::end(); ?>
	</div>
</div>
