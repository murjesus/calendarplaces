<?php


function __autoload($class)
{
	$class2=strtolower(str_replace('_', '/', $class)).".php";	
	require_once $class2;
}