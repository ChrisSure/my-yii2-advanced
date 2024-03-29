<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ua-Ua',
    'modules' => [],
    'aliases' => [
        '@img' => '@frontend/web/img',
        '@img_path' => '/frontend/web/img',
        '@img_ck' => '/backend/web/ck',
        '@img_ck_path' => '@backend/web/ck',
    ],
    //Обмеження входу (тільки з ролями admin || super_admin)
    'as access' => [
        'class' => 'yii\filters\AccessControl',
        'except' => ['site/login', 'site/error'],
        'rules' => [
            [
                'allow' => true,
                'roles' => ['admin', 'super_admin'],
            ],
        ],
    ],
    //Поведення захисту по IP
    'as AccessBehavior' => [
        'class' => \common\logic\behavior\SecurityBehavior::className(),
   	],
   	//ElFinder (файловий менеджер)
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['admin', 'super_admin'],
            'plugin' => [
                [
                    'class'=>'\mihaildev\elfinder\plugin\Sluggable',
                    'lowercase' => true,
                    'replacement' => '-'
                ]
            ],
            'roots' => [
                [
                    'baseUrl'=>'@img_ck',
                    'basePath'=> '@img_ck_path',
                    'name' => 'ck'
                ],
            ],
        ],
    ],
    'components' => [
    	//Підключення теми (адмінки) admin-lte
    	'view' => [
	         'theme' => [
	             'pathMap' => [
	                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
	             ],
	         ],
	    ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\logic\entities\auth\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
