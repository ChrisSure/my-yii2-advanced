<?php
namespace backend\controllers\system;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
* Контроллер для очистки кешу
*/
class CacheController extends Controller
{
	
	public function actionView()
	{
		return $this->render('cache');
	}
	
	
	public function actionClear()
	{
		if (Yii::$app->cache->flush()) {
			Yii::$app->session->setFlash('success', 'Кеш очищено !');
			return $this->redirect(['view']);
		}
	}
	
}

?>