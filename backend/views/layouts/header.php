<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\MyWidget;
use backend\widgets\UserWidget;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
				
				<!--Order-->
				<?=MyWidget::widget();?>
				<!--Order-->
				
				<!--User-->
				<?=UserWidget::widget();?>
				<!--User-->

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="<?=Url::to(['/system/setting'])?>" title="Настройки"><i class="fa fa-gears"></i></a> <!--data-toggle="control-sidebar"-->
                </li>
                <li>
                    <a href="<?=Url::to(['/system/cache'])?>" title="Очистити кеш"><i class="fa fa-cubes"></i></a> <!--data-toggle="control-sidebar"-->
                </li>
            </ul>
        </div>
    </nav>
</header>
