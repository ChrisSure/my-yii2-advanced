<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\logic\entities\blog\Pages;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сторінки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	    <p>
	        <?= Html::a('Додати', ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
		<?php Pjax::begin(); ?>    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
					[
			        	'label' => 'Сортування',
	                    'value' => function (Pages $model) {
	                        return
	                        Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', ['index', 'id' => $model->id, 'arrow' => 'up']) .'&nbsp;&nbsp;'.
	                        Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', ['index', 'id' => $model->id, 'arrow' => 'down']);
	                    },
	                    'format' => 'raw',
	                    'contentOptions' => ['style' => 'text-align: center'],
	                ],
		            'slug',
		            'name',
		            [
		            	'attribute' => 'status',
		            	'label' => 'Статус',
		            	'filter'=>Html::activeDropDownList($searchModel, 'status',ArrayHelper::map([0=>['title'=>'Не активовані','status'=>0],1=>['title'=>'Активовані','status'=>1]], 'status',
		            		function($cat) {
								return $cat['title'];
		            		}),['class'=>'form-control','prompt' => 'Всі статуси']),
		            	'value'=> function(Pages $data) {
		            		if ($data->status == 1) {
								return '<span class="label label-success">Активований</span>';
							} else {
								return '<span class="label label-danger">Не активований</span>';
							}
						},
						'format' => 'raw',
		            ],
		            [
                        'attribute' => 'created_at',
                        'label' => 'Фільтр дата',
                        'filter' => \kartik\date\DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_from',
                            'attribute2' => 'date_to',
                            'type' => \kartik\date\DatePicker::TYPE_RANGE,
                            'separator' => '-',
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]),
                        'format' => 'datetime',
                    ],

		            ['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
		<?php Pjax::end(); ?>
	</div>
</div>
