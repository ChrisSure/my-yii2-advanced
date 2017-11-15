<?php
namespace backend\widgets;

use Yii;

/**
* Віджет виводить віджет вверху
*/
class MyWidget extends \yii\bootstrap\Widget
{

    public function run() {
		
		return $this->render('my');
    }
    
    
}
?>