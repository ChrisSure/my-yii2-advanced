<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Відновлення паролю';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="site-request-password-reset">
				<h1><?= Html::encode($this->title) ?></h1>
            	<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                	<?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('E-mail') ?>
                	<div class="form-group">
                    	<?= Html::submitButton('Відправити', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                	</div>
            	<?php ActiveForm::end(); ?>
				</div>
		</div>
	</div>
</div>