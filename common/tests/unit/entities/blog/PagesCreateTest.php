<?php
namespace common\tests\entities\blog;

use common\logic\entities\blog\Pages;


class PagesCreateTest extends \Codeception\Test\Unit
{
	
    public function testSuccess()
    {
        $pages = Pages::create(
            $name = 'Name',
            $slug = 'slug',
            $title = 'Full header',
            $text = 'Texting',
            $description = 'Description',
            $keywords = 'Keywords',
            $status = 1
        );

        $this->assertEquals($name, $pages->name);
        $this->assertEquals($slug, $pages->slug);
        $this->assertEquals($title, $pages->title);
        $this->assertEquals($text, $pages->text);
        $this->assertEquals($description, $pages->description);
        $this->assertEquals($keywords, $pages->keywords);
        $this->assertEquals($status, $pages->status);
    }
    
}