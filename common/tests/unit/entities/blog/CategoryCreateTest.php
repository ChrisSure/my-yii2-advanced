<?php
namespace common\tests\entities\blog;

use common\logic\entities\blog\Category;


class CategoryCreateTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $category = Category::create(
            $name = 'Name',
            $slug = 'slug',
            $title = 'Full header',
            $description = 'Description',
            $keywords = 'Keywords'
        );

        $this->assertEquals($name, $category->name);
        $this->assertEquals($slug, $category->slug);
        $this->assertEquals($title, $category->title);
        $this->assertEquals($description, $category->description);
        $this->assertEquals($keywords, $category->keywords);
    }
    
}