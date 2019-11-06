<?php
	// database
	define('HOST',         'localhost:81');
    define('DB_NAME',      'trello');
    define('DB_USER',      'root');
    define('DB_PASSWORD',  '');
    //domain
    define('DOMAIN',       'trello');
	define('WEB_DOMAIN',   'http://localhost/'.DOMAIN);
	// ASSET
	define('DIR_THEMES',   'assets');
	define('URL_IMAGES', 	WEB_DOMAIN.'/'.DIR_THEMES.'/images');
	define('URL_CSS', 		WEB_DOMAIN.'/'.DIR_THEMES.'/css');
	define('URL_JS', 		WEB_DOMAIN.'/'.DIR_THEMES.'/js');
	define('URL_DEFAULT_IMAGE', WEB_DOMAIN.'/'.DIR_THEMES.'/images/default.jpg');
	define('URL_DEFAULT_TABLE_IMAGE', DIR_THEMES.'/images/default_table.png');
?>