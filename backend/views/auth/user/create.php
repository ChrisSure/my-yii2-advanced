<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\live\models\User */

$this->title = 'Додати';
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <?= $this->render('_form', [
        'model' => $model, 'crud' => true,
    ]) ?>
</div>
