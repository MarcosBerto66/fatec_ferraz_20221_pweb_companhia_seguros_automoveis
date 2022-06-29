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
            $clienteDAO = new ClienteDAO();
            if($this->clienteDAO->deletarCliente($cliente)){
                echo "<script language='javascript' type='text/javascript'>
                alert('Dados deletados com sucesso!')
                window.location.href='../view/clientes.php'
                </script>";
            }
        }

        public function adicionarCliente(){
            $clienteDAO = new ClienteDAO();
            $cliente = new Cliente();
            $cliente->setNome($_POST['nomeCliente']);
            $cliente->setRg($_POST['rgCliente']);
            $cliente->setCpf($_POST['cpfCliente']);
            $cliente->setUf($_POST['ufCliente']);
            $cliente->setCidade($_POST['cidadeCliente']);
            $cliente->setLogradouro($_POST['logradouroCliente']);
            $cliente->setBairro($_POST['bairroCliente']);
            $cliente->setCep($_POST['cepCliente']);
            $cliente->setNum($_POST['numCliente']);
            if ($clienteDAO->adicionarCliente($cliente)) {
                echo "<script>alert('Registro incluído com sucesso!');document.location='../view/clientes.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar o registro!);history.back()</script>";
            }
        }

        public function alterarCliente($cliente){
            $clienteDAO = new ClienteDAO();
            $cliente->setNome($_POST['nomeCliente']);
            $cliente->setRg($_POST['rgCliente']);
            $cliente->setCpf($_POST['cpfCliente']);
            $cliente->setUf($_POST['ufCliente']);
            $cliente->setCidade($_POST['cidadeCliente']);
            $cliente->setLogradouro($_POST['logradouroCliente']);
            $cliente->setBairro($_POST['bairroCliente']);
            $cliente->setCep($_POST['cepCliente']);
            $cliente->setNum($_POST['numCliente']);
            if ($clienteDAO->alterarCliente($cliente)) {
                echo "<script>alert('Registro alterado com sucesso!');document.location='../view/clientes.php'</script>";
            } else {
                echo "<script>alert('Erro ao alterar o registro!);history.back()</script>";
            }
        }

    }

    if(isset($_GET['action'])){

        $clienteController = new ClienteController();
    
        $action = $_GET['action'];
        //echo $action;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        
        switch ($action) {
            case 'delete':
                //echo $id;
                $cliente = new Cliente();
                $cliente->setId($id);
                //echo $cliente->getId();
                $clienteController->deletarCliente($cliente);
                
                break;

            case 'create':
                $clienteController->adicionarCliente();
                break;
            
            case 'update':
                $cliente = new Cliente();
                $cliente->setId($id);
                $clienteController->alterarCliente($cliente);
                break;
            
            default:
                # code...
                break;
        }
    }
    
    


?>