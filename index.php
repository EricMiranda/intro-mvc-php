<?php
#===================================================#
#     coded by: Moises Espindola         _    _    #
#     nick: zaer00t                     | |  (_)   #
#    ___  _ __   ___   __ _  ___   __ _ | |_  _    #
#   / __|| '__| / _ \ / _` |/ __| / _` || __|| |   #
#  | (__ | |   |  __/| (_| |\__ \| (_| || |_ | |   #
#   \___||_|    \___| \__,_||___/ \__,_| \__||_|   #
#                                                  #
#    e-mail: zaer00t@gmail.com                     #
#    www: http://creasati.com.mx                   #
#    date: 12/Septiembre/2012                      #
#    code name: creasati.com.mx                    #
#==================================================#

setlocale(LC_CTYPE, 'es');
date_default_timezone_set('America/Mexico_City');
require_once("app/app.php");

$class_name = APP_DEFAULT_CONTROLLER;
$function_name = "index";
$function_params = array();
$params = array();

if (isset($_GET["url"]))
{
    $params = explode("/", $_GET["url"]);
}

if(isset($params[0]))
{
    $tmp = ucfirst($params[0]) . "Controller";

    if(file_exists(APP_CONTROLLER_PATH . "/" . $tmp . ".php" ))
    {
        $class_name = $tmp;
        App::load_controller($class_name);
        if(isset($params[1]))
        {
            if(method_exists($class_name, $params[1]))
            {
                $function_name = $params[1];
                for($i = 2; $i < count($params); $i++)
                {
                    $function_params[] = $params[$i];
                }
            }
            else
            {
                for ($i = 1; $i < count($params); $i++)
                {
                    $function_params[] = $params[$i];
                }
            }
        }
    }
    else
    {
        App::load_controller(APP_DEFAULT_CONTROLLER);
        if (isset($params[0]))
        {
            if (method_exists($class_name, $params[0]))
            {
                $function_name = $params[0];
                for ($i = 1; $i < count($params); $i++)
                {
                    $function_params[] = $params[$i];
                }
            }
            else
            {
                for ($i = 0; $i < count($params); $i++)
                {
                    $function_params[] = $params[$i];
                }
            }
        }
    }
}
else
{
    App::load_controller(APP_DEFAULT_CONTROLLER);
}
call_user_func(array($class_name, $function_name) , $function_params);
function memoria()
{
	$mem_usage = memory_get_usage(true);

	if ($mem_usage < 1024)
		echo $mem_usage." bytes";
	elseif ($mem_usage < 1048576)
		echo round($mem_usage/1024,2)." kilobytes";
	else
		echo round($mem_usage/1048576,2)." megabytes";
	echo "<br/>";
}
?>
