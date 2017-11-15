<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\logic\entities\search\SecuritySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Захист IP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-index"><div class="box">
	<div class="box-body">
	    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	    <p>
	        <?= Html::a('Додати', ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	            'ip',
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
