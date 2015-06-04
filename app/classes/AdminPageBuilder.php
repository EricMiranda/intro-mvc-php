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

class AdminPageBuilder
{
	public static function header($title,$css=null, $js=null) {
		$ga = 'UA-44776421-1';
		$fb_appid = '591758137512355';

		App::load_view('admin/header', array(
			'page_title' => $title,
			'page_css' => $css,
			'page_js' => $js,
		));
	}

	public static function headerAdmin($title,$css=null, $js=null) {
		$ga = 'UA-44776421-1';
		$fb_appid = '591758137512355';

		App::load_view('admin/Admheader', array(
			'page_title' => $title,
			'page_css' => $css,
			'page_js' => $js,
		));
	}

    public static function topbar() {
        App::load_view('admin/topbar', array("", ""));
    }

    public static function topbarAdmin($activo)
    {
		App::load_view("admin/Admtopbar",array("activo"=>$activo));
    }

    public static function footer() {
        App::load_view('admin/footer', array("", ""));
    }

    public static function footerAdmin() {
		App::load_view('admin/Admfooter', array("", ""));
	}

    /* otras funcionalidades */
    public static function topViews($title)
    {
        App::load_view('widgets/masVisto',array('title'=>$title));
    }
    public static function recientes($title)
    {
        App::load_view('widgets/recientes',array('title'=>$title));
    }
    public static function Slider()
    {
        App::load_view('widgets/slider',array());
    }

    public static function sidebar()
    {
		App::load_view("admin/modulos/sidebar",array(null));
    }
}

?>
