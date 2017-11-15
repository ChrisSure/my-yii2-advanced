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
                <?=Html::encode(\Yii::$app->user->identity->username);?>
                <small>Зареєстрований - <?=date('d-m-y, h:i:s',\Yii::$app->user->identity->created_at);?></small>
            </p>
        </li>
    	<!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?=Url::to(['/auth/user/view', 'id' => \Yii::$app->user->id])?>" class="btn btn-default btn-flat">Профіль</a>
            </div>
            <div class="pull-right">
                <?= Html::a('Вийти', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']);?>
            </div>
        </li>
    </ul>
</li>