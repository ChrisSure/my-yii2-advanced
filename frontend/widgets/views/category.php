<?
use yii\helpers\Html;
?>
<div>
	<h3>Категорії</h3>
	<? foreach($nav as $value): ?> 
		<? $indent = ($value->depth > 1 ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $value->depth - 1) . ' ' : '');?>
        <? echo $indent . Html::a(Html::encode($value->name), ['/blog/category/view', 'slug' => Html::encode($value->slug)]) . '<br/>';?>
	<? endforeach; ?>
</div>