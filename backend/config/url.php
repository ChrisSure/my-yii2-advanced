<?
return [
	'enablePrettyUrl' => true,
	'showScriptName' => false,
	'rules' => [
	    '' => 'site/index',
	    
        'pages' => 'blog/pages/index',
	    'pages/create' => 'blog/pages/create',
	    'pages/update/<id:\d+>' => 'blog/pages/update',
	    'pages/view/<id:\d+>' => 'blog/pages/view',
	    
	    'category' => 'blog/category/index',
	    'category/create' => 'blog/category/create',
	    'category/update/<id:\d+>' => 'blog/category/update',
	    'category/move-up/<id:\d+>' => 'blog/category/move-up',
	    'category/move-down/<id:\d+>' => 'blog/category/move-down',
	    
	    'user' => '/auth/user/index',
	    'user/create' => 'auth/user/create',
	    'user/update/<id:\d+>' => 'auth/user/update',
	    'user/password/<id:\d+>' => 'auth/user/password',
	    'user/view/<id:\d+>' => 'auth/user/view',
	    
	    
	],
];
?>