<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\live\models\User */

$this->title = 'Зміна пароля';
$this->params['breadcrumbs'][] = ['label' => 'Адміністратори', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <?php $form = ActiveForm::begin(); ?>
		    	<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
		    	<div>
			    	<?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
				</div>
	    <?php ActiveForm::end(); ?>
	</div>
</div>
