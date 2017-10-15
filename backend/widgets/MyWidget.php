<?php
namespace backend\widgets;

use Yii;


class MyWidget extends \yii\bootstrap\Widget
{

    public function run() {
		
		return $this->render('my');
    }
    
    
}
?>