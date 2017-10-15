<?php
namespace common\services;

use Yii;
use common\entities\Pages;
use common\repositories\PagesRepository;
use backend\logic\form\PagesForm;


class PagesServices
{
	
	private $page;
	
	public function __construct(PagesRepository $page)
	{
		$this->page = $page;
	}
	
	
	public function create(PagesForm $form)
    {
        $page = Pages::create(
        	$form->name,
            $form->slug,
            $form->title,
            $form->text,
            $form->description,
            $form->keywords,
            $form->status
        );
        $this->page->save($page);
        return $page;
    }
    
    
    public function edit($id, PagesForm $form)
    {
        $page = $this->page->get($id);
        $page->edit(
        	$form->name,
            $form->slug,
            $form->title,
            $form->text,
            $form->description,
            $form->keywords,
            $form->status
        );
        $this->page->save($page);
    }
    
    
    public function remove($id): void
    {
        $page = $this->page->get($id);
        $this->page->remove($page);
    }
	
	
	/**
	* Метод проводить сортування сторінки вверх
	* @param int $id
	* 
	* @return void
	*/
	public function MoveUp($id)
	{
		$page = $this->page->getPage($id);
		if ($other = $this->page->getSortPage($page->sort - 1)) {
			$other->sort ++;
			$other->save(false);
			$page->sort--;
			if (!$page->save(false)) {
				throw new \RuntimeException('Sort error.');
			}
		}
	}
	
	/**
	* Метод проводить сортування сторінки вниз
	* @param int $id
	* 
	* @return void
	*/
	public function MoveDown($id)
	{
		$page = $this->page->getPage($id);
		if ($other = $this->page->getSortPage($page->sort + 1)) {
			$other->sort --;
			$other->save(false);
			$page->sort++;
			if (!$page->save(false)) {
				throw new \RuntimeException('Sort error.');
			}
		}
	}
	
}
?>