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

UPDATE medico SET medico.senha = "$2y$10$EgLsNHiGOmW30BGMqwpI5ui8MHVvtitN4.OmhQliPrgZUoC/HN.Ey" WHERE medico.id = 1;

INSERT INTO medico(email, nome, senha) VALUES('ex2@gmail.com', 'Ana Carla', '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a');

INSERT INTO horarios(id_medico, data_horario, horario_agendado) VALUES(3, '2021-04-12 18:00', 1);
SELECT * FROM horarios;
SELECT * FROM medico;
SELECT horarios.id id_horario, medico.id id_medico, medico.nome, GROUP_CONCAT(CONCAT(horarios.id, ',', horarios.data_horario, ',', horarios.horario_agendado) SEPARATOR ';') data_horarios FROM horarios INNER JOIN medico ON horarios.id_medico = medico.id GROUP BY id_medico;