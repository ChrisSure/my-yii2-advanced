<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\logic\entities\auth\User;
use common\logic\entities\auth\Role;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\live\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Користувачі';
$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="box">
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
	            'username',
	            [
	            	'attribute' => 'status',
	            	'label' => 'Статус',
	            	'filter' => Html::activeDropDownList($searchModel, 'status', ArrayHelper::map([0=>['title'=>'Не активовані','status'=>0],1=>['title'=>'Активовані','status'=>1]], 'status',
	            		function($cat) {
							return $cat['title'];
	            		}),['class'=>'form-control','prompt' => 'Всі статуси']),
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
	            	'filter' => Html::activeDropDownList($searchModel, 'role', Role::roleList(), ['class'=>'form-control', 'prompt' => 'Всі ролі']),
	            	'value'=> function(User $data) {
	            		return $data->auth->item_name;
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
    </div>
</div>
