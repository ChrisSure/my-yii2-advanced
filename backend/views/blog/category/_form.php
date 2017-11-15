<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\CategoryForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-body">
        	<? if (\Yii::$app->controller->action->id == 'create'): ?>
        		<?= $form->field($model, 'parentId')->dropDownList($model->parentCategoriesList(false)); ?>
        	<? else: ?>
        		<?= $form->field($model, 'parentId')->dropDownList($model->parentCategoriesList($category->id)); ?>
        	<? endif; ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">SEO</div>
        <div class="box-body">
        	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'keywords')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success', 'name' => 'category-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>