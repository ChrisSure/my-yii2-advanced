<?php
namespace common\logic\behavior;

use Yii;
use yii\base\Behavior;
use common\logic\repositories\system\SecurityRepository;
use yii\web\NotFoundHttpException;


/**
* Поведення захисту від блокованих IP
*/
class SecurityBehavior extends Behavior
{
	
   	private $secRep;
   	
   	
   	public function init()
   	{
		$this->secRep = new SecurityRepository();
	}
   	
   	
   
   	public function events()
    {   
        return [    
            \yii\web\Controller::EVENT_BEFORE_ACTION => 'monitoring'    
        ];
	}    
   
   
   	/**
	* Метод перевіряє чи користувач не перевищив ліміт вводу, якщо так то користувач викидується з додатку
	* @param string $ip
	* 
	* @return bool
	*/
	public function monitoring($ip)
	{
		$this->mercy();
		if (Yii::$app->controller->action->id == 'login') {
			$res = $this->secRep->getIp(Yii::$app->request->userIP);
			if ($res['count'] >= 5) {
				if (!Yii::$app->user->isGuest) {
					Yii::$app->user->logout();
				}
				throw new NotFoundHttpException('Ви перевищили ліміт вводу, вас заблоковано на 1 годину.');
			}
			return true;
		}
		
	}
	
	
	/**
	* Метод визначає час, витягує заблоковані ip, якщо вони є делегує в репозиторій подальші дії (видалення по часу)
	* 
	* @return void
	*/
	private function mercy()
	{
		$time = time() - Yii::$app->params['ipBlockTime'];
		if ($res = $this->secRep->getTime($time)) {
			$this->secRep->mercyIp($res);
		}
	}
	
}
?>