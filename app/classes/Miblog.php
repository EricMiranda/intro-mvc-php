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

	class Miblog
	{
		private $db;
		private $id;
		private $usuario_id;
		private $estatus_id;
		private $categoria_id;
		private $titulo;
		private $resumen;
		private $pic;
		private $pic_fb;
		private $contenido;
		private $fecha;
		private $prints;
		private $shared;
		private $referers;
		private $impres;

		function __construct($db) { $this->db = $db; }

		private static function crear($db,$usuario_id,$estatus_id,$categoria_id,$titulo,$resumen,$pic,$pic_fb,$contenido,$fecha,$prints)
		{
			$dato = array();
			$dato["usuario_id"]=$usuario_id;
			$dato["estatus_id"]=$estatus_id;
			$dato["categoria_id"]=$categoria_id;
			$dato["titulo"]=$titulo;
			$dato["resumen"]=$resumen;
			$dato["pic"]=$pic;
			$dato["pic_fb"]=$pic_fb;
			$dato["contenido"]=$contenido;
			$dato["fecha"]=$fecha;
			$data["prints"]=$prints;
			return $db->insert("miblog",$dato);
		}

		public static function nuevo($db,$usuario_id,$estatus_id,$categoria_id,$titulo,$resumen,$pic,$pic_fb,$contenido,$fecha,$prints)
		{
			return Miblog::crear($db,$usuario_id,$estatus_id,$categoria_id,$titulo,$resumen,$pic,$pic_fb,$contenido,$fecha,$prints);
		}

		public function getNomCat($id)
		{
			if(is_numeric($id))
			{
				$r1 = $this->db->select("categoria","nombre","id=?",array($id));
				return $r1[0]["nombre"];
			}
		}

		public function leer($id)
		{
			$id=(int)$id;
			$r1 = $this->db->select("miblog","id,usuario_id,estatus_id,categoria_id,titulo,resumen,pic,pic_fb,contenido,fecha,prints,shared,referers,impres", "id=?",array($id));
			if($r1!=null)
			{
				$r1=$r1[0];
				$this->id=$id;
				$this->usuario_id=$r1["usuario_id"];
				$this->estatus_id=$r1["estatus_id"];
				$this->categoria_id=$r1["categoria_id"];
				$this->titulo=$r1["titulo"];
				$this->resumen=$r1["resumen"];
				$this->pic=$r1["pic"];
				$this->pic_fb=$r1["pic_fb"];
				$this->contenido=$r1["contenido"];
				$this->fecha=$r1["fecha"];
				$this->prints=$r1["prints"];
				$this->shared=$r1["shared"];
				$this->referers=$r1["referers"];
				$this->impres=$r1["impres"];
				}
			else
			{
				throw new AppException("Error: Error interno del sistema");
			}
		}

		public static function getTotal($db)
		{
			$r1 = $db->select("miblog", "count(id) as total", "id>? order by id asc", array(0));

			if (count($r1) > 0)
				return $r1[0]['total'];
			else
				return 0;
		}
		public static function leer_todos($db)
		{
			$r1 = $db->select("miblog", "id", "id>? order by id asc", array(0));
			$datos = array();
			if (count($r1) > 0)
			{
				foreach($r1 as $id_dato)
				{
					$entrada = new Miblog($db);
					$entrada->leer($id_dato["id"]);
					$datos[] = $entrada;
				}
			}
			return $datos;
		}
		public function getEntradas($desde,$hasta)
		{
			$r1=$this->db->select("miblog","id","id>? order by id asc limit ?,?",array(0,$desde,$hasta));
			$datos=array();
			if(count($r1)>0): #existen entradas
				foreach($r1 as $info):
					$lista = new Miblog($this->db);
					$lista->leer($info["id"]);
					$datos[]=$lista;
				endforeach;
			endif;
			return $datos;
		}
		private function actualizar()
		{
			$dato = array();
			$dato["usuario_id"]=$this->usuario_id;
			$dato["estatus_id"]=$this->estatus_id;
			$dato["categoria_id"]=$this->categoria_id;
			$dato["titulo"]=$this->titulo;
			$dato["resumen"]=$this->resumen;
			$dato["pic"]=$this->pic;
			$dato["pic_fb"]=$this->pic_fb;
			$dato["contenido"]=$this->contenido;
			$dato["fecha"]=$this->fecha;
			$dato["prints"]=$this->prints;
			return $db->update("miblog",$dato);
		}

		

		/** setters **/
		public function setId($dato){ $this->id=$dato; }
		public function setUsuario_id($dato){ $this->usuario_id=$dato; }
		public function setEstatus_id($dato){ $this->estatus_id=$dato; }
		public function setCategoria_id($dato){ $this->categoria_id=$dato; }
		public function setTitulo($dato){ $this->titulo=$dato; }
		public function setResumen($dato){ $this->resumen=$dato; }
		public function setPic($dato){ $this->pic=$dato; }
		public function setPic_fb($dato){ $this->pic_fb=$dato; }
		public function setContenido($dato){ $this->contenido=$dato; }
		public function setFecha($dato){ $this->fecha=$dato; }
		public function setPrints($dato){ $this->prints=$dato; }
		public function setShared($dato){ $this->shared=$dato; }
		public function setReferers($dato){ $this->referers=$dato; }
		public function setImpres($dato){ $this->impres=$dato; }

		/** getters **/
		public function getId(){ return $this->id; }
		public function getUsuario_id(){ return $this->usuario_id; }
		public function getEstatus_id(){ return $this->estatus_id; }
		public function getCategoria_id(){ return $this->categoria_id; }
		public function getTitulo(){ return $this->titulo; }
		public function getResumen(){ return $this->resumen; }
		public function getPic(){ return $this->pic; }
		public function getPic_fb(){ return $this->pic_fb; }
		public function getContenido(){ return $this->contenido; }
		public function getFecha(){ return $this->fecha; }
		public function getPrints(){ return $this->prints; }
		public function getShared(){ return $this->shared; }
		public function getReferers(){ return $this->referers; }
		public function getImpres(){ return $this->impres; }

		// obtenemos la categoria
		public function getCategoria($id_categoria)
		{
			$sql = "select nomre from categoria where id = {$id_categoria}";
			$r1=$this->db->select("categoria","nombre","id=?",array($id_categoria));
			if(!empty($r1))
				return $cat = current($r1[0]);
			else
				return false;
		}
		/** end scaffolding **/
		public function get_nombre_url()
		{
			$nombre = $this->getTitulo();
			$nombre=str_replace(" ","_",$nombre);
			return Util::strtolower($nombre);
		}
		public function get_url()
		{
			return APP_HOST_URL . "/blog/entradas/".$this->getNomCat($this->getCategoria_id())."/".$this->get_nombre_url() . "/" . $this->id;
		}


	}
?>
