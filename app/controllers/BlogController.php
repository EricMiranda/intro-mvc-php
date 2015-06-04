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

    class BlogController implements Controller
    {
        public static function index($params)
        {
        	$db = new Database();
        	$db->connect();
			$total_entradas = Miblog::getTotal($db); #Util::debug($total_entradas);
			$blog = new Miblog($db);
			$exp=5;		//entradas por pagina
			$listas = round($total_entradas/$exp);
			
			if(isset($params[0]))
			{
				if($params[0]=='p')
				{
					if(isset($params[1]))
					{
						$pagina = (int)$params[1];
						$hasta = $pagina*$exp;
						$entradas = $blog->getEntradas($hasta,$exp);
					}					
				}
			}
			else
			{
				$entradas = $blog->getEntradas(0,5);
			}
			App::load_view("Blog/index",array('articulos'=>$entradas,'paginas'=>$listas));
        }
		
		public static function entradas($params)
		{
			if(isset($params[0]) && isset($params[1]))
			{
				if(isset($params[2]) && $params[2]!='')
				{
					$categoria = $params[0];
					$titulo = $params[1];
					$registro = (int)$params[2];
					$db = new Database();
					$db->connect();
					$entrada = new Miblog($db);
					$entrada->leer($registro);
					App::load_view("Blog/entrada",array('entrada'=>$entrada));
				}
				else
				{
					Util::redirect(APP_HOST_URL."/blog");
				}
			}
			else
			{
				Util::redirect(APP_HOST_URL."/blog");
			}
		}
    }
?>
