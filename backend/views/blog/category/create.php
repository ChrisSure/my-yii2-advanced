<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\entities\Category */

$this->title = 'Додати категорію';
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
