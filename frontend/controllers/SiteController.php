<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\logic\entities\blog\Category;



class SiteController extends Controller
{
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    
    public function actionIndex()
    {
    	$cat = Category::find()->andWhere(['>', 'depth', 0])->orderBy(['lft' => SORT_ASC])->all();
        return $this->render('index', ['cat' => $cat]);
    }

}
