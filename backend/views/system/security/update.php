<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\logic\entities\system\Security */

$this->title = 'Редагування: ' . $model->ip;
$this->params['breadcrumbs'][] = ['label' => 'Захист IP', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="security-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
