<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\logic\entities\blog\Category;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категорії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	    <p>
	        <?= Html::a('Додати категорію', ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	        	[
                	'label' => 'Сортування',
                    'value' => function (Category $model) {
                        return
                        Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', ['move-up', 'id' => $model->id]) .
                        Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', ['move-down', 'id' => $model->id]);
                    },
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'text-align: center'],
                ],
	            [
                    'attribute' => 'name',
                    'value' => function (Category $model) {
                        $indent = ($model->depth > 1 ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $model->depth - 1) . ' ' : '');
                        return $indent . Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                    },
                    'format' => 'raw',
                ],
                'slug',
                'title',
                ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
