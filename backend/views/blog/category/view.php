<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\entities\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <p>
	        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'id' => 'update-category-test']) ?>
	        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => 'Ви впевнені, що хочете видалити цей елемент?',
	                'method' => 'post',
	            ],
	        ]) ?>
	    </p>
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            'id',
	            'name',
	            'slug',
	        ],
	    ]) ?>
	</div>
</div>

<div class="box">
	<div class="box-header with-border">SEO</div>
	<div class="box-body">
		<?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            'title',
	            'description:ntext',
	            'keywords:ntext',
	        ],
	    ]) ?>
	</div>
</div>
