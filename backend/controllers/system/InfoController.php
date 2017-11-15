<?php
namespace backend\controllers\system;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


class InfoController extends Controller
{
	
	public function behaviors()
    {
    	return [
	    	'access' => [
	            'class' => AccessControl::className(),
	            'rules' => [
	            	[
		                'allow' => true,
		                'roles' => ['super_admin'],
		            ],
	            ]
	        ]
	    ];
    }
	
	
	
	public function actionView()
	{
		$info = [];
		$info['name'] = Yii::$app->name;
		$info['language'] = Yii::$app->language;
		$info['timeZone'] = Yii::$app->timeZone;
		$info['charset'] = Yii::$app->charset;
		$info['version'] = Yii::$app->version;
		/*$info['basepath'] = Yii::$app->basePath;
		$info['controllerPath'] = Yii::$app->controllerPath;
		$info['defaultRoute'] = Yii::$app->defaultRoute;
		$info['homeUrl'] = Yii::$app->homeUrl;
		$info['layoutPath'] = Yii::$app->layoutPath;
		$info['viewPath'] = Yii::$app->viewPath;
		*/
		
		return $this->render('info', ['info' => $info]);
	}
	
	
}

?>