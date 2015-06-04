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

	define("APP_PROFILE","1");

    if (APP_PROFILE == 0)
    {
        define("APP_HOST_URL", "http://" . $_SERVER["HTTP_HOST"]);
        define("APP_ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);

        define("APP_DB_HOST", "localhost");
        define("APP_DB_USER", "yoyo");
        define("APP_DB_PASSWORD", "nano");
        define("APP_DB_CATALOG", "technos");// temporal
    }

    if (APP_PROFILE == 1)
    {
        define("APP_HOST_URL", "http://" . $_SERVER["HTTP_HOST"]);
        define("APP_ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);

        define("APP_DB_HOST", "localhost");
        define("APP_DB_USER", "zaer$98/?¡");
        define("APP_DB_PASSWORD", "sdfert5456$#%&/(");
        define("APP_DB_CATALOG", "technos");
    }
	define("APP_NAME","www.creasati.com.mx");
    define("APP_DEFAULT_CONTROLLER", "InicioController");
    define("APP_ASSETS", APP_HOST_URL . "/app/assets");
    define("APP_IMG_URL", APP_HOST_URL . "/app/assets/img");
    define("APP_CSS_URL", APP_HOST_URL . "/app/assets/css");
    define("APP_JS_URL", APP_HOST_URL . "/app/assets/js");
    define("APP_BIN_PATH", APP_ROOT_PATH . "/app");
    define("APP_CLASS_PATH", APP_BIN_PATH . "/classes");
    define("APP_VIEW_PATH", APP_BIN_PATH . "/views");
    define("APP_CONTROLLER_PATH", APP_BIN_PATH . "/controllers");
    define("APP_WIDGET_PATH", APP_BIN_PATH . "/views/widgets");
    define("APP_MAILS_PATH", APP_BIN_PATH . "/mails");
    define("APP_IMG_PATH", APP_BIN_PATH . "/assets/img");
    define("APP_DEBUG", true);

    if (APP_DEBUG)
    {
        ini_set('display_errors',1);
        error_reporting(E_ALL|E_STRICT);
    }

    require_once(APP_CLASS_PATH . "/core/AppException.php");

    class App
    {
        private static function load_file($path, $data = NULL, $once = true)
        {
            if (file_exists($path))
            {
                if ($once)
                {
                    require_once($path);
                }
                else
                {
                    require($path);
                }
                return true;
            }
            else
            {
                return false;
            }
        }

        public static function load_class($class)
        {
            if (!App::load_file(APP_CLASS_PATH . "/" . $class . ".php"))
            {
                throw new AppException("Error: clase '" . $class . "' no encontrada.");
            }
        }

        public static function load_view($view, $data)
        {
            if (!App::load_file(APP_VIEW_PATH . "/" . $view . ".php", $data, false))
            {
                #throw new AppException("Error: página '" . $view . "' no encontrada.");
                Util::redirect("error/404");
            }
        }

        public static function load_controller($controller)
        {
            if (!App::load_file(APP_CONTROLLER_PATH . "/" . $controller . ".php"))
            {
                throw new AppException("Error: controlador '" . $controller . "' no encontrado.");
            }
        }

        public static function load_widget($widget,$data)
        {
			if(!App::load_file(APP_WIDGET_PATH."/".$widget.".php",$data,false))
			{
				throw new AppException("Error: El widget al que intenta acceder no esta disponible.");
			}
        }

        public static function get_img_url($img)
        {
            return APP_IMG_URL . "/" . utf8_encode($img);
        }

        public static function get_assets($data)
        {
			return APP_ASSETS."/".utf8_encode($data);
        }

        public static function get_css_url($css)
        {
            return APP_CSS_URL . "/" . $css;
        }

        public static function get_js_url($js)
        {
            return APP_JS_URL . "/" . $js;
        }

        public static function get_packed_js_url($js)
        {
            return APP_HOST_URL . "/js/" . $js;
        }

        public static function get_rs_plugin_css($css)
        {
            return APP_RS_PLUGIN."/css/".$css;
        }
        public static function get_rs_plugin_js($js)
        {
            return APP_RS_PLUGIN."/js/".$js;
        }
    }

    function __autoload($class_name)
    {
        App::load_class($class_name);
    }

    App::load_class("core/Controller");
    App::load_class("core/DataBase");
    #App::load_class("core/DataBase2");
    App::load_class("core/FileUtil");
    App::load_class("core/Util");
    App::load_class("core/GUIUtil");
    App::load_class("core/FormUtil");
    #App::load_class("core/JavaScriptPacker");
    App::load_class("core/DateUtil");
    App::load_class("core/Mailer");
    App::load_class("core/password");

    function exception_handler($exception)
    {
        GUIUtil::error_msg("error", "Error", "<strong>Se produjo un error</strong>: " . $exception->getMessage());
    }
    set_exception_handler('exception_handler');
?>
