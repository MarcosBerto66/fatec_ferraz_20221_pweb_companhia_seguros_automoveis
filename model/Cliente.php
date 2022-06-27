<?php

    class Cliente{

        private $id;
        private $nome;
        private $rg;
        private $cpf;
        private $uf;
        private $cidade;
        private $logradouro;
        private $bairro;
        private $cep;
        private $num;
        private $telefones;

        public function __construct($id = null, $nome = null, $rg = null, $cpf = null, $uf = null, $cidade = null, $logradouro = null, $bairro = null, $cep = null, $num = null, $telefones = null){
            $this->id = $id;
            $this->nome = $nome;
            $this->rg = $rg;
            $this->cpf = $cpf;
            $this->uf = $uf;
            $this->cidade = $cidade;
            $this->logradouro = $logradouro;
            $this->bairro = $bairro;
            $this->cep = $cep;
            $this->num = $num;
            $this->telefones = $telefones;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setUf($uf){
            $this->uf = $uf;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }

        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function setCep($cep){
            $this->cep = $cep;
        }

        public function setNum($num){
            $this->num = $num;
        }

        public function setTelefones($telefones){
            $this->telefones = $telefones;
        }

        public function getId($id){
            return $this->id;
        }

        public function getNome($nome){
            return $this->nome;
        }

        public function getRg($rg){
            return $this->rg;
        }

        public function getCpf($cpf){
            return $this->cpf;
        }

        public function getUf($uf){
            return $this->uf;
        }

        public function getCidade($cidade){
            return $this->cidade;
        }

        public function getLogradouro($logradouro){
            return $this->logradouro;
        }

        public function getBairro($bairro){
            return $this->bairro;
        }

        public function getCep($cep){
            return $this->cep;
        }

        public function getNum($num){
            return $this->num;
        }

        public function getTelefones($telefones){
            return $this->telefones;
        }
    }
?>