<pre>
<?php
include 'View.php';
print_r($_SERVER);
spl_autoload_register(null, false);
spl_autoload_extensions('.php');
spl_autoload_register('controllerLoader');
spl_autoload_register('modelLoader');
spl_autoload_register('queriesLoader');
spl_autoload_register('viewsLoader');


function controllerLoader($className)
{
	$filename = $className.'.php';
	$file = 'controllers/' . $filename;
	if(!file_exists($file))
		return false;
	include $file;
}

function modelLoader($className)
{
	$filename = $className.'.php';
	$file = 'models/' . $filename;
	if(!file_exists($file))
		return false;
	include $file;
}

function queriesLoader($className)
{
	$filename = $className.'.php';
	$file = 'models/queries/' . $filename;
	if(!file_exists($file))
		return false;
	include $file;
}

function viewsLoader($className)
{
	$filename = $className.'.php';
	$file = 'View/' . $filename;
	if(!file_exists($file))
		return false;
	include $file;
}


$class_name = "HomeController";
$action_name = "indexAction";
$params = "";
$some_class = new $class_name;
$result = $some_class->$action_name($params);
print_r($result);


?>
</pre>
