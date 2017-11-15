<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	 	<?php $form = ActiveForm::begin(); ?>
	 		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
		    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
		    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		 	<div class="form-group">
				<?= Html::submitButton('Зберегти', ['class' => 'btn btn-success', 'name' => 'setting-button']) ?>
			</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
