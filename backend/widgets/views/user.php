<?
use yii\helpers\Html;
use yii\helpers\Url;
?>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    	<img src="<?=\Yii::getAlias('@img_path')?>/avatar99.jpg" class="user-image" alt="User Image"/>
        <span class="hidden-xs">Alexander Pierce</span>
    </a>
    <ul class="dropdown-menu">
    	<!-- User image -->
        <li class="user-header">
            <img src="<?=\Yii::getAlias('@img_path')?>/avatar99.jpg" class="img-circle" alt="User Image"/>
            <p>
                Taras
                <small>Зареєстрований - 24.09.2017</small>
            </p>
        </li>
    	<!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?=Url::to(['/user/view', 'id' => \Yii::$app->user->id])?>" class="btn btn-default btn-flat">Профіль</a>
            </div>
            <div class="pull-right">
                <?= Html::a('Вийти', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']);?>
            </div>
        </li>
    </ul>
</li>