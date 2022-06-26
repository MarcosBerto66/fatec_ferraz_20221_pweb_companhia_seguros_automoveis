/* db_modelo_logico_companhia_seguros_automoveis: */

CREATE DATABASE db_companhia_seguros_automoveis;
GO
USE db_companhia_seguros_automoveis

CREATE TABLE tbCliente (
    idCliente INT PRIMARY KEY AUTO_INCREMENT,
    nomeCliente VARCHAR(200) NOT NULL,
    rgCliente  VARCHAR(12) NOT NULL,
    cpfCliente VARCHAR(14) NOT NULL,
    ufCliente CHAR(2) NOT NULL,
    cidadeCliente VARCHAR(200) NOT NULL,
    logradouroCliente VARCHAR(200) NOT NULL,
    bairroCliente VARCHAR(200) NOT NULL, 
    cepCliente CHAR(9) NOT NULL,
    numCliente VARCHAR(10) NOT NULL
);

CREATE TABLE tbVeiculo (
    idVeiculo INT PRIMARY KEY AUTO_INCREMENT,
    placaVeiculo CHAR(7) NOT NULL,
    renavamVeiculo CHAR(12) NOT NULL,
    anoVeiculo SMALLINT NOT NULL,
    fabricanteVeiculo VARCHAR(200) NOT NULL,
    idCliente INT NOT NULL,
	FOREIGN KEY (idCliente) REFERENCES tbCliente(idCliente)
);

CREATE TABLE tbOcorrencia (
    idOcorrencia INT PRIMARY KEY AUTO_INCREMENT,
    dataOcorrencia DATE NOT NULL,
    cidadeOcorrencia VARCHAR(200) NOT NULL,
    logradouroOcorrencia VARCHAR(200) NOT NULL,
    bairroOcorrencia VARCHAR(200) NOT NULL,
    cepOcorrencia CHAR(9) NOT NULL,
    ufOcorrencia CHAR(2) NOT NULL,
    idVeiculo INT NOT NULL,
	FOREIGN KEY (idVeiculo) REFERENCES tbVeiculo(idVeiculo)
);

CREATE TABLE tbTelefoneCliente (
    idTelefoneCliente INT PRIMARY KEY AUTO_INCREMENT,
    numTelefoneCliente VARCHAR(14) NOT NULL,
    idCliente INT NOT NULL,
	FOREIGN KEY (idCliente) REFERENCES tbCliente(idCliente)
);
