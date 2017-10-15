<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		    	<?=$form->field($model, 'text')->widget(CKEditor::className(), [
			  		'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
				]);?>
		    	<?= $form->field($model, 'status')->checkbox() ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">SEO</div>
			<div class="box-body">
				<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
		    	<?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>