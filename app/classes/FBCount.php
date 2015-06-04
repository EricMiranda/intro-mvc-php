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

	class FBCount
	{
		public $base = "https://graph.facebook.com/fql?q=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count,%20commentsbox_count,%20comments_fbid,%20click_count%20FROM%20link_stat%20WHERE%20url=%27{URL}%27";

		public static function getUrl($url)
		{
			$url = str_replace("{URL}",$url,$this->base);
			$datos = file_get_contents($url);
			$datos = str_replace('\\','',json_encode($datos));
			$datos= explode(":",$datos);
			//Util::debug('DATOS DE FBC ',$datos);
			$likes = array('likes'=>(int)$datos[7],'comments'=>(int)$datos[8]);
			return $likes;
		}
	}

?>