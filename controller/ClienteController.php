<?php
    require_once("../dao/ClienteDAO.php");

    class ClienteController{

        private $clienteDAO;

        public function __construct(){
            $this->clienteDAO = new ClienteDAO();
        }

        public function listarTodosClientes(){
            return $this->clienteDAO->listarTodosClientes();
        }

    }
?>