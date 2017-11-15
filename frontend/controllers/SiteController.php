<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\logic\repositories\system\SettingRepository;
use frontend\logic\components\Meta;


/**
* Контроллер головний
*/
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
    	$setting = (new SettingRepository())->get(1);
    	$meta = Meta::create($setting->title, $setting->description, $setting->keywords);
        return $this->render('index', ['meta' => $meta]);
    }

}
