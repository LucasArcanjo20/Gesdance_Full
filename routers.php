<?php 
	global  $routes;

	$routes = array();

	//Exemplo
	/*
	* 1º parte: o que o usuário vai digitar no navegador
	*2º parte: pelo que será substituído no controller 
	*/
	$routes['/contact_view/{slug}'] = "/controller/action/:paramentro";