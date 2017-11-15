<?php
namespace frontend\logic\components;

use Yii;
use yii\helpers\Html;



class Meta
{
	
	/**
	* Метод для встановлення meta - тегів
	* @param string $title
	* @param string $description
	* @param string $keywords
	* 
	* @return string
	*/
	public static function create($title, $description, $keywords)
	{
		Yii::$app->view->title = $title;
		$description = Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => Html::encode($description)], 'description');
    	$keywords = Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => Html::encode($keywords)], 'keywords');
		return $description . $keywords;
	}
		
}
?>