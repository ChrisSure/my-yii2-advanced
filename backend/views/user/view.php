<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\entities\User;

/* @var $this yii\web\View */
/* @var $model app\modules\live\models\User */

$this->title = 'Перегляд - ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Адміністратори', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <p>
	        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a('Змінити пароль', ['password', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
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
	            'username',
	            'email',
	            [
	            	'attribute' => 'status',
	            	'label' => 'Статус',
	            	'value'=> function(User $data) {
	            		if ($data->status == 1) {
							return '<span class="label label-success">Активований</span>';
						} else {
							return '<span class="label label-danger">Не активований</span>';
						}
					},
					'format' => 'raw',
	            ],
	            [
	            	'attribute' => 'role',
	            	'label' => 'Роль',
	            	'value'=> function(User $data) {
	            		return $data->auth->item_name;
					},
	            ],
	            'created_at:datetime',
	            'updated_at:datetime',
	        ],
	    ]) ?>
	</div>
</div>
