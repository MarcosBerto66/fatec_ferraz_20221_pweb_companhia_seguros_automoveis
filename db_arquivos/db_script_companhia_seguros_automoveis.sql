/* db_modelo_logico_companhia_seguros_automoveis: */

CREATE TABLE tbCliente (
    idCliente INTEGER PRIMARY KEY,
    nomeCliente VARCHAR,
    rgCliente CHARACTER,
    cpfCliente CHARACTER,
    ufCliente CHARACTER,
    cidadeCliente VARCHAR,
    logradouroCliente VARCHAR,
    bairroCliente VARCHAR,
    cepCliente CHARACTER,
    numCliente VARCHAR
);

CREATE TABLE tbVeiculo (
    idVeiculo INTEGER PRIMARY KEY,
    placaVeiculo CHARACTER,
    renavamVeiculo CHARACTER,
    anoVeiculo SMALLINT,
    fabricanteVeiculo VARCHAR,
    idCliente INTEGER
);

CREATE TABLE tbOcorrencia (
    idOcorrencia INTEGER PRIMARY KEY,
    dataOcorrencia DATE,
    cidadeOcorrencia VARCHAR,
    logradouroOcorrencia VARCHAR,
    bairroOcorrencia VARCHAR,
    cepOcorrencia CHARACTER,
    ufOcorrencia CHARACTER,
    idVeiculo INTEGER
);

CREATE TABLE tbTelefoneCliente (
    idTelefoneCliente INTEGER PRIMARY KEY,
    numTelefoneCliente VARCHAR,
    idCliente INTEGER
);
 
ALTER TABLE tbVeiculo ADD CONSTRAINT FK_tbVeiculo_2
    FOREIGN KEY (idCliente)
    REFERENCES tbCliente (idCliente)
    ON DELETE RESTRICT;
 
ALTER TABLE tbOcorrencia ADD CONSTRAINT FK_tbOcorrencia_2
    FOREIGN KEY (idVeiculo)
    REFERENCES tbVeiculo (idVeiculo)
    ON DELETE CASCADE;
 
ALTER TABLE tbTelefoneCliente ADD CONSTRAINT FK_tbTelefoneCliente_2
    FOREIGN KEY (idCliente???)
    REFERENCES tbCliente (???);