<?php
function url() {

	$request = $_SERVER['REQUEST_SCHEME'].'://';
	$server = $_SERVER['SERVER_NAME'].'/';
	$xdir = explode('/',__DIR__);
	$dir = $xdir[4].'/';

	echo $request.$server.$dir;

	return $dir;
}

function home() {

	$request = $_SERVER['REQUEST_SCHEME'].'://';
	$server = $_SERVER['SERVER_NAME'].'/';
	$xdir = explode('/',__DIR__);
	$dir = $xdir[4].'/';

	echo $request.$server.$dir;

	return $home;
}

function view() {

	$request = $_SERVER['REQUEST_SCHEME'].'://';
	$server = $_SERVER['SERVER_NAME'].'/';
	$xdir = explode('/',__DIR__);
	$dir = $xdir[4].'/';
	$views = 'views'.'/';

	echo $request.$server.$dir.$views;


	return $view;
}