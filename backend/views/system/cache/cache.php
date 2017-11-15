<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Очищення кешу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	 	<a href="<?=Url::to(['clear'])?>" class="btn btn-danger">Очистити кеш</a>
	</div>
</div>

