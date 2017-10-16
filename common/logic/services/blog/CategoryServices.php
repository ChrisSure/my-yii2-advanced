<?php

namespace common\logic\services\blog;

use common\logic\entities\blog\Category;
use backend\logic\form\blog\CategoryForm;
use common\logic\repositories\blog\CategoryRepository;


class CategoryServices
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function create(CategoryForm $form)
    {
        $parent = $this->categories->get($form->parentId);
        $category = Category::create(
        	$form->name,
            $form->slug,
            $form->title,
            $form->description,
            $form->keywords
        );
        $category->appendTo($parent);
        $this->categories->save($category);
        return $category;
    }

    public function edit($id, CategoryForm $form)
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        $category->edit(
        	$form->name,
            $form->slug,
            $form->title,
            $form->description,
            $form->keywords
        );
        if ($form->parentId !== $category->parent->id) {
            $parent = $this->categories->get($form->parentId);
            $category->appendTo($parent);
        }
        $this->categories->save($category);
    }

    public function moveUp($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        if ($prev = $category->prev) {
            $category->insertBefore($prev);
        }
        $this->categories->save($category);
    }

    public function moveDown($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        if ($next = $category->next) {
            $category->insertAfter($next);
        }
        $this->categories->save($category);
    }

    public function remove($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        //if ($this->products->existsByMainCategory($category->id)) {
            //throw new \DomainException('Unable to remove category with products.');
        //}
        $this->categories->remove($category);
    }

    private function assertIsNotRoot(Category $category): void
    {
        if ($category->isRoot()) {
            throw new \DomainException('Unable to manage the root category.');
        }
    }
}