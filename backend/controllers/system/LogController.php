<?php
namespace backend\controllers\system;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\logic\entities\system\Logs;



class LogController extends Controller
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
	
	/**
	* Перегляд логів
	*/
	public function actionView()
	{
		$query = Logs::find();
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		return $this->render('log', ['dataProvider' => $dataProvider]);
	}
	
	/**
	* Очищення логів
	*/
	public function actionDelete()
	{
		Logs::deleteAll();
		Yii::$app->session->setFlash('success', 'Логи очищено !');
		return $this->redirect(['view']);
	}
	
	
}

?>