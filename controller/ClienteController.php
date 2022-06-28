<?php
    require_once("../dao/ClienteDAO.php");
    require_once("../model/Cliente.php");

    class ClienteController{

        private $clienteDAO;

        public function __construct(){
            $this->clienteDAO = new ClienteDAO();
        }

        public function listarTodosClientes(){
            return $this->clienteDAO->listarTodosClientes();
        }

        public function deletarCliente($cliente){
            if($this->clienteDAO->deletarCliente($cliente)){
                echo "<script language='javascript' type='text/javascript'>
                alert('Dados deletados com sucesso!')
                window.location.href='index.php'
                </script>";
            }
        }

    }

    if(isset($_GET['action']) && isset($_GET['id'])){

        $clienteController = new ClienteController();
    
        $action = $_GET['action'];
        $id = $_GET['id'];
        
        switch ($action) {
            case 'delete':
                $cliente = new Cliente();
                $cliente->setId($id);
                $clienteController->deletarCliente($cliente);
                echo $cliente->getId();
                break;
            
            default:
                # code...
                break;
        }
    }
    
    


?>