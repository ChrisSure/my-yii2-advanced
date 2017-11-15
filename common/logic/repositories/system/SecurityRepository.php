<?php
namespace common\logic\repositories\system;

use common\logic\entities\system\Security;


class SecurityRepository
{
	
	public function get($id): Security
    {
        if (!$security = Security::findOne($id)) {
            throw new \RuntimeException('Error with select one page.');
        }
        return $security;
    }
    
    public function save(Security $security): void
    {
        if (!$security->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Security $security): void
    {
        if (!$security->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
	
	
	
	
	/**
	* Метод повертає кількість невдалих спроб по ip користувача
	* @param string $ip
	* 
	* @return object
	*/
	public function getIp($ip)
	{
		return Security::find()->where(['ip' => $ip])->asArray()->one();
	}
	
	/**
	* Метод повертає об'єкт захисту по ip
	* @param string $ip
	* 
	* @return object
	*/
	public function getOne($ip)
	{
		return Security::findOne(['ip' => $ip]);
	}
	
	/**
	* Метод повертає об'єкти захисту по date
	* @param string $date
	* 
	* @return object
	*/
	public function getTime($date)
	{
		return Security::find()->where(['<', 'updated_at', $date])->all();
	}
	
	
	/**
	* Метод якщо ше не існує ip в базі вносить його, якщо вже існує збільшує кількість на 1
	* Якщо кількість дорівнює 5 то нічого не міняє
	* @param object $res
	* @param string $ip
	* 
	* @return bool
	*/
	public function logAttempt($res, $ip = false)
	{
		if (!$res) {
			$model = new Security();
			$model->ip = $ip;
			$model->count = 1;
			$model->created_at = time();
			if (!$model->save(false)) {
				throw new \RuntimeException('Saving error.');
			}
		} else {
			if ($res->count < 5) {
				$res->count++;
			}
			$res->updated_at = time();
			if (!$res->save(false)) {
				throw new \RuntimeException('Saving error.');
			}
		}
		return true;
	}
	
	/**
	* Метод в транзакции перебирає заблоковані Ip і якщо пройшов відповідний час видаляє їх з бази (розблоковує)
	* @param object $res
	* 
	* @return void
	*/
	public function mercyIp($res)
	{
		$transaction = Security::getDb()->beginTransaction();
		try {
			foreach($res as $value) {
				$model = Security::findOne($value->id);
				$model->delete();
			}
		    $transaction->commit();
		} catch(\Exception $e) {
		    $transaction->rollBack();
		    throw $e;
		} catch(\Throwable $e) {
		    $transaction->rollBack();
		    throw $e;
		}
	}
	
	
	
}
?>