<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\entities\Pages;
/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сторінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
		<p>
			<?= Html::a(\Yii::t('app', 'Редагувати'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a(\Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
			    'class' => 'btn btn-danger',
			    'data' => [
			        'confirm' => 'Ви впевнені, що хочете видалити дану сторінку ?',
			        'method' => 'post',
			    ],
			]) ?>
		</p>
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
			    'slug',
			    'name',
			    [
			        'attribute' => 'status',
			        'label' => 'Статус',
			        'value'=> function(Pages $data) {
			            if ($data->status == 1) {
							return '<span class="label label-success">Активовано</span>';
						} else {
							return '<span class="label label-danger">Не активовано</span>';
						}
					},
					'format' => 'raw',
		        ],
			    'created_at:datetime',
			    'updated_at:datetime',
			],
		]) ?>
	</div>
</div>
	
<div class="box">
	<div class="box-header with-border">Текст</div>
	<div class="box-body">
		<? if ($model->text): ?>
			<?=$model->text;?>
		<? else: ?>
			<p>Пусто</p>
		<? endif;?>
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