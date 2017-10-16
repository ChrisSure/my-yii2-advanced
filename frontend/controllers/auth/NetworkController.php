<?php

namespace frontend\controllers\auth;

use Yii;
use yii\web\Controller;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;
use yii\authclient\AuthAction;
use common\logic\entities\auth\User;
use frontend\logic\services\auth\NetworkService;



/**
* Контроллер для входу і реєстрації через соц.мережі
*/
class NetworkController extends Controller
{
    private $service;
	
	/**
	* Конструктор встановлює властивості сервісів
	* 
	* @param undefined $id
	* @param undefined $module
	* @param undefined $service
	* @param undefined $config
	* 
	* @return void
	*/
    public function __construct($id, $module, NetworkService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }
	
	/**
	* Класс клієнта реєстрації через соц.мережі
	*/
    public function actions()
    {
        return [
            'auth' => [
                'class' => AuthAction::class,
                'successCallback' => [$this, 'onAuthSuccess'],
                'successUrl' => '/',
            ],
        ];
    }
	
	/**
	* Метод для реєстрації через соц.мережі
	*/
    public function onAuthSuccess(ClientInterface $client)
    {
        $network = $client->getId();
        $attributes = $client->getUserAttributes();
        $name = ArrayHelper::getValue($attributes, 'name');
        $identity = ArrayHelper::getValue($attributes, 'id');
        try {
            $user = $this->service->auth($network, $identity, $name);
            Yii::$app->user->login(new User($user), 3600 * 24 * 30);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
    
    
}