<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ua-Ua',
    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@img' => '/frontend/web/img',
        '@img_path' => '@frontend/web/img',
    ],
    'as AccessBehavior' => [
        'class' => \common\logic\behavior\SecurityBehavior::className(),
   	],
    'components' => [
    	//Вхід через соц.сеті
    	'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '249230592148073',
                    'clientSecret' => '0be6756a0413ed562d4d4c412269aedb',
                ],
                // и т.д.
            ],
        ],
        'reCaptcha' => [
	        'name' => 'reCaptcha',
	        'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
	        'siteKey' => '6LeIeDQUAAAAAPZZZ24RMVPGaXKAPEhaFoz5sXqO',
	        'secret' => '6LeIeDQUAAAAAKIArHXyNiZWfkp56uUAmbRrD8tn',
	    ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\logic\entities\auth\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require(__DIR__ . '/url.php'),
        
    ],
    'params' => $params,
];
