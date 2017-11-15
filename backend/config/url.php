<?
return [
	'enablePrettyUrl' => true,
	'showScriptName' => false,
	'rules' => [
		
		//main
	    '' => 'site/index',
	    
	    //pages
        'pages' => 'blog/pages/index',
	    'pages/create' => 'blog/pages/create',
	    'pages/update/<id:\d+>' => 'blog/pages/update',
	    'pages/view/<id:\d+>' => 'blog/pages/view',
	    //category
	    'category' => 'blog/category/index',
	    'category/create' => 'blog/category/create',
	    'category/update/<id:\d+>' => 'blog/category/update',
	    'category/view/<id:\d+>' => 'blog/category/view',
	    'category/move-up/<id:\d+>' => 'blog/category/move-up',
	    'category/move-down/<id:\d+>' => 'blog/category/move-down',
	    
	    //user
	    'user' => '/auth/user/index',
	    'user/create' => 'auth/user/create',
	    'user/update/<id:\d+>' => 'auth/user/update',
	    'user/password/<id:\d+>' => 'auth/user/password',
	    'user/view/<id:\d+>' => 'auth/user/view',
	    
	    //system
	    'system/info' => 'system/info/view',
	    'system/setting' => 'system/setting/view',
	    'system/log' => 'system/log/view',
	    'system/cache' => 'system/cache/delete',
	    //security
	    'security' => 'system/security/index',
		'security/create' => 'system/security/create',
		'security/update/<id:\d+>' => 'system/security/update',
		'security/view/<id:\d+>' => 'system/security/view',
	    
	    
	    
	],
];
?>