<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\logic\entities\blog\Category;


/**
* Віджет виводу категорій
*/
class CategoryWidget extends Widget
{
	
	public function run()
	{
		$nav = Category::find()->andWhere(['>', 'depth', 0])->orderBy(['lft' => SORT_ASC])->all();
		return $this->render('category', ['nav' => $nav]);
	}
	
}
?>