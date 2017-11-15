<?php
namespace backend\widgets;

use Yii;

/**
* Віджет виводить верхній блок з даними користувача
*/
class UserWidget extends \yii\bootstrap\Widget
{

    public function run() {
		
		return $this->render('user');
    }
    
    
}
?>