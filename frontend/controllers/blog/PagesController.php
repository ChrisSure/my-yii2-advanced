<?php

namespace frontend\controllers\blog;

use yii\web\Controller;
use common\logic\repositories\blog\PagesRepository;
use common\logic\entities\system\Logs;
use frontend\logic\components\Meta;


/**
* Контроллер для роботи з сторінками
*/
class PagesController extends Controller
{
    public $pages;
    
    public function __construct($id, $module, PagesRepository $pages, $config = [])   
    {
        parent::__construct($id, $module, $config);
        $this->pages = $pages;
    }
	
    
    public function actionView($slug)
    {
        if (!$page = $this->pages->getWith('slug', $slug)) {
			Logs::add('Спроба звернутись до неіснуючої сторінки', __FILE__, 2);
        	throw new \yii\web\HttpException(404, 'Немає даної сторінки');
		}
        $meta = Meta::create($page->title, $page->description, $page->keywords);
        return $this->render('view', ['page' => $page, 'meta' => $meta]);
    }

}
