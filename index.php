<pre>
<?php
print_r($_SERVER);
spl_autoload_register(null, false);
spl_autoload_extensions('.php');

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

spl_autoload_register('controllerLoader');
spl_autoload_register('modelLoader');
spl_autoload_register('queriesLoader');
spl_autoload_register('viewsLoader');


?>
</pre>
