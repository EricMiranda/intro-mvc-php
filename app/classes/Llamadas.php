<?php
#==================================================#
#     coded by: Moises Espindola         _    _    #
#     nick: zaer00t                     | |  (_)   #
#    ___  _ __   ___   __ _  ___   __ _ | |_  _    #
#   / __|| '__| / _ \ / _` |/ __| / _` || __|| |   #
#  | (__ | |   |  __/| (_| |\__ \| (_| || |_ | |   #
#   \___||_|    \___| \__,_||___/ \__,_| \__||_|   #
#                                                  #
#    e-mail: zaer00t@gmail.com                     #
#    www: http://creasati.com.mx                   #
#    date: 29/05/2015                              #
#    code name: El Embrague                        #
#==================================================#

	class Llamadas
	{
		
		private $db;
		private $id;
		private $fecha;
		private $hora;
		private $tipo;
		private $sentido;
		private $numero;
		private $tiempo;
		private $costo_real;
		private $costo_free;

		function __construct($db) { $this->db = $db; }

		private static function crear($db,$fecha,$hora,$tipo,$sentido,$numero,$tiempo,$costo_real,$costo_free)
		{
			$dato = array();
			$dato["fecha"]=$fecha;
			$dato["hora"]=$hora;
			$dato["tipo"]=$tipo;
			$dato["sentido"]=$sentido;
			$dato["numero"]=$numero;
			$dato["tiempo"]=$tiempo;
			$dato["costo_real"]=$costo_real;
			$dato["costo_free"]=$costo_free;
			return $db->insert("llamadas",$dato);
		}

		public static function nuevo($db,$fecha,$hora,$tipo,$sentido,$numero,$tiempo,$costo_real,$costo_free)
		{
			return Llamadas::crear($db,$fecha,$hora,$tipo,$sentido,$numero,$tiempo,$costo_real,$costo_free);
		}

		public function leer($id)
		{
			$id=(int)$id;
			$r1 = $this->db->select("llamadas","id,fecha,hora,tipo,sentido,numero,tiempo,costo_real,costo_free", "id=?",array($id));
			if($r1!=null)
			{
				$r1=$r1[0];
				$this->id=$id;
				$this->fecha=$r1["fecha"];
				$this->hora=$r1["hora"];
				$this->tipo=$r1["tipo"];
				$this->sentido=$r1["sentido"];
				$this->numero=$r1["numero"];
				$this->tiempo=$r1["tiempo"];
				$this->costo_real=$r1["costo_real"];
				$this->costo_free=$r1["costo_free"];
				}
			else
			{
				throw new AppException("Error: Error interno del sistema");
			}
		}
		

		public static function leer_todos($db)
		{
			$r1 = $db->select("llamadas", "id", "id>? order by id asc", array(0));
			$datos = array();
			if (count($r1) > 0)
			{
				foreach($r1 as $id_dato)
				{
					$entrada = new Llamadas($db);
					$entrada->leer($id_dato["id"]);
					$datos[] = $entrada;
				}
			}
			return $datos;
		}

		private function actualizar()
		{
			$dato = array();
			$dato["fecha"]=$this->fecha;
			$dato["hora"]=$this->hora;
			$dato["tipo"]=$this->tipo;
			$dato["sentido"]=$this->sentido;
			$dato["numero"]=$this->numero;
			$dato["tiempo"]=$this->tiempo;
			$dato["costo_real"]=$this->costo_real;
			$dato["costo_free"]=$this->costo_free;
			return $db->update("llamadas",$dato);
		}

		

		/** setters **/
		public function setId($dato){ $this->id=$dato; }
		public function setFecha($dato){ $this->fecha=$dato; }
		public function setHora($dato){ $this->hora=$dato; }
		public function setTipo($dato){ $this->tipo=$dato; }
		public function setSentido($dato){ $this->sentido=$dato; }
		public function setNumero($dato){ $this->numero=$dato; }
		public function setTiempo($dato){ $this->tiempo=$dato; }
		public function setCosto_real($dato){ $this->costo_real=$dato; }
		public function setCosto_free($dato){ $this->costo_free=$dato; }

		/** getters **/
		public function getId(){ return $this->id; }
		public function getFecha(){ return $this->fecha; }
		public function getHora(){ return $this->hora; }
		public function getTipo(){ return $this->tipo; }
		public function getSentido(){ return $this->sentido; }
		public function getNumero(){ return $this->numero; }
		public function getTiempo(){ return $this->tiempo; }
		public function getCosto_real(){ return $this->costo_real; }
		public function getCosto_free(){ return $this->costo_free; }

		/** end scaffolding **/
	}
?>