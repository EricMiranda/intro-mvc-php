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

	class InicioController implements Controller
	{
		public static function index($params)
		{
			#$db = new DataBase();
			#$db->connect();

			App::load_view("inicio",array(null));
		}

		public static function scaffold($params)
		{
			$table = $params[0];
			$db = new DataBase();
			$db->connect();
			App::load_class("core/Scaffolding");
			$scaffold = new Scaffolding($db,$table);
			$scaffold->buildMetodo();
		}

		public static function error($params)
		{
			if(isset($params))
			{
				if($params[0]=='404')
				{
 					App::load_view("404",array(null));
				}
			}
		}

	}
?>
