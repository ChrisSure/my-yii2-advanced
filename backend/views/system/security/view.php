<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\logic\entities\system\Security */

$this->title = $model->ip;
$this->params['breadcrumbs'][] = ['label' => 'Захист IP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <p>
			<?= Html::a(\Yii::t('app', 'Редагувати'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'id' => 'update-security-test']) ?>
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
	            'id',
	            'ip',
	            'count',
	            'created_at:datetime',
	            'updated_at:datetime',
	        ],
	    ]) ?>
	</div>
</div>
