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

        public function deletarCliente($cliente){
            $sql = "DELETE FROM tbCliente WHERE idCliente = ".$cliente->getId();
            if(!mysqli_query($this->banco->getConexao(), $sql)){
                $result = false;
            }else{
                $result = true;
            }
            mysqli_close($this->banco->getConexao());
            return $result;
        }

        public function adicionarCliente($cliente){
            $sql = "INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `rgCliente`, `cpfCliente`, `ufCliente`, `cidadeCliente`, `logradouroCliente`, `bairroCliente`, `cepCliente`, `numCliente`) VALUES (NULL, '".$cliente->getNome()."', '".$cliente->getRg()."', '".$cliente->getCpf()."', '".$cliente->getUf()."', '".$cliente->getCidade()."', '".$cliente->getLogradouro()."', '".$cliente->getBairro()."', '".$cliente->getCep()."', '".$cliente->getNum()."')";
            $result = mysqli_query($this->banco->getConexao(), $sql) or die("Erro ao retornar os dados.");
            mysqli_close($this->banco->getConexao());
            return $result;
        }
    }

?>