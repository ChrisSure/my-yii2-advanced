<?php
namespace common\logic\repositories\blog;

use common\logic\entities\blog\Pages;


class PagesRepository
{
	
	public function get($id): Pages
    {
        if (!$category = Pages::findOne($id)) {
            throw new RuntimeException('Pages is not found.');
        }
        return $category;
    }
    
    public function getWith($with, $value)
	{
		return Pages::find()->where([$with => $value])->andwhere(['status' => 1])->one();
	}

    public function save(Pages $page): void
    {
        if (!$page->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Pages $page): void
    {
        if (!$page->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
	
	
	
	/**
	* Метод повертає об'єкт вибраної сторінки
	* @param int $id
	* 
	* @return object
	*/
	public function getPage($id)
	{
		return Pages::findOne($id);
	}
	
	
	/**
	* Метод повертає массив сторінки по сортувальному номері
	* @param int $sort
	* 
	* @return array
	*/
	public function getSortPage($sort) {
		return Pages::findOne(['sort' => $sort]);
	}
	
	
	/**
	* Метод повертає максимальне число сортування
	* 
	* @return int
	*/
	public function lastSort()
	{
		$res = Pages::find()->max('sort');
		return isset($res) ? $res + 1 : 1;
	}
	
	
	/**
	* Метод перебирає номери сортування і зменшує їх на 1
	* @param int $sort
	* 
	* @return void
	*/
	public function updateAllSort($sort)
	{
		Pages::updateAllCounters(['sort' => -1], ['>=', 'sort', $sort]);
	}
	
	
}
?>