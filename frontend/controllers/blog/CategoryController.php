<?php

namespace frontend\controllers\blog;

use yii\web\Controller;
use common\logic\repositories\blog\CategoryRepository;
use common\logic\entities\system\Logs;
use frontend\logic\components\Meta;


/**
* Контроллер для роботи з категоріями
*/
class CategoryController extends Controller
{
    public $category;
    
    public function __construct($id, $module, CategoryRepository $category, $config = [])   
    {
        parent::__construct($id, $module, $config);
        $this->category = $category;
    }
	
    
    public function actionView($slug)
    {
        if (!$category = $this->category->getWith('slug', $slug)) {
			Logs::add('Спроба звернутись до неіснуючої категорії', __FILE__, 2);
        	throw new \yii\web\HttpException(404, 'Немає даної категорії');
		}
        $meta = Meta::create($category->title, $category->description, $category->keywords);
        return $this->render('view', ['category' => $category, 'meta' => $meta]);
    }

}
