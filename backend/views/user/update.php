<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\live\models\User */

$this->title = 'Редагування';
$this->params['breadcrumbs'][] = ['label' => 'Адміністратори', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="user-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
