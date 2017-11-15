<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Відновлення паролю';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="site-reset-password">	
    			<h1><?= Html::encode($this->title) ?></h1>
            	<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                	<?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                	<div class="form-group">
                    	<?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'set-password-button']) ?>
                	</div>
           	 	<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
