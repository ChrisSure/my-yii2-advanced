<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\logic\entities\system\Security */

$this->title = 'Додати IP';
$this->params['breadcrumbs'][] = ['label' => 'Захист IP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
