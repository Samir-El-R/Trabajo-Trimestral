<?php
    class BBDD {
        private $servidor;
        private $user;
        private $pass;
        private $base_datos;
        private $puerto;
        private $socket;
        public $descriptor;
        private $resultado;

        function __construct($servidor, $user, $pass, $base_datos, $puerto, $socket) {
            $this->servidor = $servidor;
            $this->user = $user;
            $this->pass = $pass;
            $this->base_datos = $base_datos;
            $this->puerto = $puerto;
            $this->socket = $socket;
            $this->descriptor = mysqli_connect($this->servidor, $this->user, $this->pass, $this->base_datos, $this->puerto, $this->socket);
        }

        public function consulta($consulta) {
            $this->resultado = mysqli_query($this->descriptor, $consulta);
        }

        public function extraer_registro(){
            if ($fila =  mysqli_fetch_array($this->resultado, MYSQLI_ASSOC)) {
                return $fila;
            } else {
                return false;
            }
        }

        public function numero_filas() {
            return mysqli_num_rows($this->resultado);
        }

        public function filas_afectadas() {
            return mysqli_affected_rows($this->descriptor);
        }
    }
    
    $host="localhost";
    $user="root";
    $password="";
    $dbname="foro";
<<<<<<< Updated upstream
    $port=3306;
=======
    $port=14000;
    // $port=3306;
>>>>>>> Stashed changes
    $socket="";

    $MyBBDD = new BBDD($host, $user, $password, $dbname, $port, $socket);
    // print_r($MyBBDD); 

?>
    