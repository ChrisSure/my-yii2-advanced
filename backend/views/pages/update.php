<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = 'Редагування сторінки: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сторінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
