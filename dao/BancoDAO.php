<?php

    date_default_timezone_set('America/Sao_Paulo');

    define('BD_SERVIDOR', 'localhost');
    define('BD_USUARIO', 'root');
    define('BD_SENHA', '');
    define('BD_BANCO', 'db_companhia_seguros_automoveis');

    class Banco{

        private $conexao;

        public function __construct(){
            //echo "Conexão efetuada com sucesso!";
            $this->conectar();
        }

        private function conectar(){
            $this->conexao = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
        }

        public function getConexao(){
            return $this->conexao;
        }
    }
?>