CREATE DATABASE teste_fc;
USE teste_fc;

CREATE TABLE medico(
    id          	INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email 			VARCHAR(35) UNIQUE NOT NULL,
    nome			VARCHAR(50) NOT NULL,
    senha			CHAR(60) NOT NULL,
    data_criacao	TIMESTAMP DEFAULT CURRENT_TIMESTAMP, /* AMBOS DEVEM SER FORNECIDOS  PELO SISTEMA!*/
    data_alteracao	TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE horarios(
	id 					INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_medico			INT NOT NULL,
    data_horario		TIMESTAMP NOT NULL,
    horario_agendado	INT NOT NULL,
    data_criacao		TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alteracao		TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_medico) REFERENCES medico(id)
);
