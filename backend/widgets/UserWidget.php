<?php
namespace backend\widgets;

use Yii;


class UserWidget extends \yii\bootstrap\Widget
{

    public function run() {
		
		return $this->render('user');
    }
    
    
}
?>