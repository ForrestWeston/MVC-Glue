<pre>
<?php

$controller_name;
$action_name;
$param_name;

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
	$file = 'view/' . $filename;
	if(!file_exists($file))
		return false;
	include $file;
}


class View
{
	public $view_bag;
	public $name;

	public function __construct($view_bag, $name=""){
		$this->name = $name;
		$this->view_bag = $view_bag;
	}

	public function render_view($controller, $method)
	{
		$view_bag = $this->view_bag;
		include 'views'.'/'.$controller.'/'.$method.'.php';

	}
	//this does the model calling and assigns vars 
	//will need a call back function will need to handle the first case of user going to the root index
}

$url = $_SERVER["PATH_INFO"];

if($url == "")
{
	$Home = new HomeController();
	$result = $Home->indexAction("poo");
	$result->render_view('Home', 'Index');
}
else
{
	$parsed_url = explode('/', $url);

	$controller_name = $parsed_url[1]."Controller";
	$action_name = $parsed_url[2]."Action";
	$param_name = $parsed_url[3];


	$some_class = new $controller_name;
	$result = $some_class->$action_name("hello");
	$result->render_view($parsed_url[1], $parsed_url[2]);
}


function mvc_build_url($controller, $action, $params)
{
	$url = '/'.$controller.'/'.$action.'/'.$params;
	return $url;
}	

function mvc_build_style_url($css)
{
	return '/content/style'.$css;
}

function mvc_build_script_url($script)
{
	return '/content/scripts'.$scripts;
}

function mvc_redirect($controller, $action, $params)
{
		
}
	




?>
</pre>
