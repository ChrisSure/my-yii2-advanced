<?php
namespace common\logic\services\system;

use Yii;
use yii\web\NotFoundHttpException;
use common\logic\repositories\system\SecurityRepository;
use backend\logic\form\system\SecurityForm;
use common\logic\entities\system\Security;



class SecurityServices
{
	
	private $secRep;
	
	
	public function __construct(SecurityRepository $secRep)
	{
		$this->secRep = $secRep;
	}
	
	
	public function create(SecurityForm $form)
    {
        $security = Security::create(
        	$form->ip
        );
        $this->secRep->save($security);
        return $security;
    }
	
	
	public function edit($id, SecurityForm $form)
    {
        $security = $this->secRep->get($id);
        $security->edit(
        	$form->ip
        );
        $this->secRep->save($security);
    }
    
    
    public function remove($id): void
    {
        $security = $this->secRep->get($id);
        $this->secRep->remove($security);
    }
	
	
	
	/**
	* Метод перевіряє чи існує ip в базі блокування
	* Дальше делегує подальші дії в репозиторій
	* @param string $ip
	* 
	* @return bool
	*/
	public function logAttempt($ip)
	{
		if ($res = $this->secRep->getOne($ip)) {
			return $this->secRep->logAttempt($res, false);
		}
		return $this->secRep->logAttempt(false, $ip);
	}
	
	/**
	* Метод перевіряє чи користувач не перевищив ліміт вводу, якщо так то користувач викидується з додатку
	* @param string $ip
	* 
	* @return bool
	*/
	public function monitoring($ip)
	{
		$res = $this->secRep->getOne($ip);
		if ($res->count >= 5) {
			if (!Yii::$app->user->isGuest) {
				Yii::$app->user->logout();
			}
			throw new NotFoundHttpException('Ви перевищили ліміт вводу, вас заблоковано на 1 годину.');
		}
		return true;
	}
	
	
	/**
	* Метод визначає час, витягує заблоковані ip, якщо вони є делегує в репозиторій подальші дії (видалення по часу)
	* 
	* @return void
	*/
	public function mercy()
	{
		$time = time() - Yii::$app->params['ipBlockTime'];
		if ($res = $this->secRep->getTime($time)) {
			$this->secRep->mercyIp($res);
		}
	}
	
	
}
?>