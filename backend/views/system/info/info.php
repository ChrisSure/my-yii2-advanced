<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Інформація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body">
	 	<table class="table">
	 		<? if($info): ?>
	 		<? foreach($info as $key => $value): ?>
	 			<tr>
	 				<td><?=$key;?></td>
	 				<td><?=$value;?></td>
	 			</tr>
	 		<? endforeach; ?>
	 		<? else: ?>
	 			<p>Немає інформації</p>
	 		<? endif;?>
	 	</table>
	</div>
</div>
