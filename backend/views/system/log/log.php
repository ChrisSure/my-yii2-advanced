<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Логи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	 	<?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	            'text',
	            'file',
	            'level',
	            'created_at:datetime',
	        ],
	    ]); ?>
	    <a href="<?=Url::to(['delete'])?>" class="btn btn-danger">Очистити логи</a>
	</div>
</div>
