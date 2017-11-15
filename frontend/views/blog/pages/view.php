<?
use yii\helpers\Html;
?>
<h3><?=Html::encode($page->name);?></h3>
<p style="font-size: 12px;">Створено в: <?=date('d-m-y, h:i:s', Html::encode($page->created_at));?></p>