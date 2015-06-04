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
class LoginAss
{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	private $db;

	public function __construct($db)
	{
		$this->db=$db;
		session_start();

		if (isset($_GET["logout"]))
		{
			LoginAss::doLogout();
			Util::redirect(APP_HOST_URL.'/admin');
		}
		elseif(isset($_POST["login"]))
		{
			$this->dologinWithPostData();
		}
	}

	private function dologinWithPostData()
	{
		// check login form contents
		if (empty($_POST['usuario']))
		{
			$this->errors[] = "Debes ingresar un nombre de usuario.";
		}
		elseif (empty($_POST['password']))
		{
			$this->errors[] = "Debes ingresar una contraseña.";
		}
		elseif(!empty($_POST['usuario']) && !empty($_POST['password']))
		{
			//checamos si existe el usuario
			$r1 = @current($this->db->select("usuario","id,email,id_permiso,id_status,nombre","email=?",array($_POST["usuario"])));
			#Util::debug($r1,1,1,'Revisando la consulta :usuario:');
			if(count($r1)>0 and $r1 != null)
			{
				// si existe el usuario checamos password
				$r2 = current($this->db->select("usuario","pwd","email=?",array($_POST["usuario"])));
				if(count($r1)>0 and $r1 != null)
				{
					if(password_verify($_POST["password"],$r2["pwd"]))
					{
						/* la verificacion del password paso :D */
						$_SESSION["usuario"]['nombre']=$r1["nombre"];
						$_SESSION["usuario"]['status']=$r1["id_status"];
						$_SESSION["usuario"]['email']=$r1["email"];
						$_SESSION["usuario"]['permisos']=$r1["id_permiso"];
						$_SESSION["usuario"]["id_usuario"]=$r1["id"];
					}
					else
					{
						$this->errors[]="Los datos de acceso son incorrectos. try again";
					}
				}
			}
			else
			{
				$this->errors[]="El usuario no existe!";
			}
        }
    }

    public static function doLogout()
    {
		if (ini_get("session.use_cookies"))
		{
			$p = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
					  $p["path"], $p["domain"],
					  $p["secure"], $p["httponly"]
					  );
		}
		// eliminamos la sesion del usuario
		$_SESSION = array();
		@session_destroy();
		Util::redirect(APP_HOST_URL . '/');
   }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status and the same time
     * verify the permisos from the user. XD
     */
    public static function isUserLoggedIn(array $permisos)
    {#Util::debug($permisos,1,1,'variables de permisos');
        if (isset($_SESSION['usuario']['nombre']))
		{
			if(in_array($_SESSION["usuario"]["permisos"],$permisos))
			{
				return true;
			}
        }
        // default return
        return false;
    }
}