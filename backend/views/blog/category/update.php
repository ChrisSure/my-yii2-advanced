<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\entities\Category */

$this->title = 'Редагування: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-update">
    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>
</div>
