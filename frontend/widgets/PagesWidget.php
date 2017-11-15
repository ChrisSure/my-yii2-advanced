<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\logic\entities\blog\Pages;


/**
* Віджет виводу сторінок
*/
class PagesWidget extends Widget
{
	
	public function run()
	{
		$pages = \Yii::$app->cache->get('pages');
		if($pages) 
			return $this->render('pages', ['pages' => $pages]);
		if ($pages === false) {
			$pages = Pages::find()->where(['status' => 1])->all();
			if($pages){
				\Yii::$app->cache->set('pages', $pages, 400);
			}
		}
		
		return $this->render('pages', ['pages' => $pages]);
		//$pages = Pages::find()->where(['status' => 1])->all();
		//return $this->render('pages', ['pages' => $pages]);
	}
	
}
?>