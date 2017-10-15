<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use shop\entities\lang\Lang;

$this->title = 'Вхід';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="site-login">
			    <h1><?= Html::encode($this->title) ?></h1>
			    <?php $form = ActiveForm::begin([
			        'id' => 'form-signup',
			    ]); ?>
			        <?= $form->field($model, 'email')->textInput(['autofocus' => true]);?>
			        <?= $form->field($model, 'password')->passwordInput();?>
			        <?= $form->field($model, 'rememberMe')->checkbox();?>
					<p><a href="<?=Url::to(['/auth/request-password-reset'])?>">Забули пароль ?</a></p>
			        <div class="form-group">
			            <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
			        </div>
			    <?php ActiveForm::end(); ?>
			</div>
			<div class="well">
	            <h2>Вхід через соціадьні мережі</h2>
	            <?= yii\authclient\widgets\AuthChoice::widget([
	                'baseAuthUrl' => ['/network/auth']
	            ]); ?>
	        </div>
		</div>
	</div>
</div>