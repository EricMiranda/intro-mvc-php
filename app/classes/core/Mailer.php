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
#    date: 06/Septiembre/2014                      #
#    code name: creasati.com.mx                    #
#==================================================#

	define("SMTP_AUTH", true);
	define("SMTP_HOST", "elembrague.com");
	define("SMTP_PORT", '587');
	define("SMTP_USER", "notificaciones@elembrague.com");
	define("SMTP_EMAIL_FROM", 'notificaciones@elembrague.com');
	define("SMTP_FROM", "El Embrague - Notificaciones");
	define("SMTP_PASS", "");
	define("SMTP_SECURE", "tls");

	class Mailer
	{
		static function send_email($to, $subject, $content, $attachment)
		{
			App::load_class("core/php_mailer/class.phpmailer");
			$mail = new PHPMailer(true);
			$mail->IsSMTP();

			try {
					$mail->SMTPDebug = 0;
					$mail->CharSet    = "UTF-8";
					$mail->SMTPSecure = SMTP_SECURE;
					$mail->SMTPAuth   = SMTP_AUTH;
					$mail->Host       = SMTP_HOST;
					$mail->Port       = SMTP_PORT;
					$mail->Username   = SMTP_USER;
					$mail->Password   = SMTP_PASS;

					if (is_array($to))
					{
						foreach($to as $addr) $mail->AddAddress($addr, '');
					}
					else
					{
						$mail->AddAddress($to, '');
					}

					$mail->SetFrom(SMTP_EMAIL_FROM, SMTP_FROM);
					$mail->Subject = $subject;
					$mail->MsgHTML($content);

					if ($attachment != null)
					{
						$mail->AddAttachment($attachment);
					}
					$mail->Send();
					return true;
				}
				catch (Exception $e)
				{
					var_dump($e);
					return false;
				}
		}
	}
?>
