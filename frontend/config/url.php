<?
return [
	'enablePrettyUrl' => true,
	'showScriptName' => false,
	'rules' => [
		//main
	    '' => 'site/index',
	    
	    //blog
	    'page/<slug:\w+>' => 'blog/pages/view',
		'category/<slug:\w+>' => 'blog/category/view',
	    
	    //auth
        'auth/signup' => 'auth/signup/signup',
        'auth/confirm-user' => 'auth/signup/confirm-user',
        'auth/login' => 'auth/auth/login',
        'auth/logout' => 'auth/auth/logout',
        'auth/request-password-reset' => 'auth/reset/request-password-reset',
        'auth/reset-password' => 'auth/reset/reset-password',
        'network/auth' => 'auth/network/auth',
        
	],
];
?>