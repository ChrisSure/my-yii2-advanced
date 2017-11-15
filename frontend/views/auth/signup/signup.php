<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="site-signup">
				<h1><?= Html::encode($this->title) ?></h1>
       			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            		<?= $form->field($model, 'username');?>
                	<?= $form->field($model, 'email');?>
                	<?= $form->field($model, 'password')->passwordInput();?>
                	
                	
                	<?= $form->field($model, 'reCaptcha')->widget(
					    \himiklab\yii2\recaptcha\ReCaptcha::className(),
					    ['siteKey' => '6LeIeDQUAAAAAPZZZ24RMVPGaXKAPEhaFoz5sXqO']
					) ?>
                	
                	<div class="form-group">
                    	<?= Html::submitButton('Зареєструватись', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
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
