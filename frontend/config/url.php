<?
return [
	'enablePrettyUrl' => true,
	'showScriptName' => false,
	'rules' => [
	    '' => 'site/index',
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