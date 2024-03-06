<?php

	class database{ //inicamos la clase 
		private $host;
		private $user;
		private $password;
		private $dataBase;

		public function __construct(){ //iniciamos el metodo construc
			// agregamos los atributos
			$this->host     ="localhost:3306"; //servidor
			$this->user     ="root2"; //Usuario Base de datos
			$this->password ="151199lagb"; //Contraseña de usuario de base de datos
			$this->dataBase ="condominio"; //Nombre de la base de datos
		}

		public function conectarse(){ //iniciamos los metodos
			$enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
			
			if($enlace){
				$enlace -> set_charset("utf8");
			}else{
				die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
			}
			return($enlace);
			mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un punto de seguridad importante.
		}
	}




