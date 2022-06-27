<?php

require_once("../model/Cliente.php");
require_once("BancoDAO.php");

    class ClienteDAO{

        private $banco;

        public function __construct(){
            $this->banco = new Banco();
        }

        public function listarTodosClientes(){
            $sql = "SELECT * FROM tbCliente";
            $result = mysqli_query($this->banco->getConexao(), $sql) or die("Erro ao retornar os dados.");
            mysqli_close($this->banco->getConexao());
            return $result;
        }
    }

?>