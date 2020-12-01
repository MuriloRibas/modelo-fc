CREATE DATABASE teste_fc;
USE teste_fc;
DROP TABLE medico;
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
    horario_agendado	INT NOT NULL,
    data_criacao		TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alteracao		TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_horario		TIMESTAMP NOT NULL,
    FOREIGN KEY (id_medico) REFERENCES medico(id)
);

UPDATE medico SET medico.senha = "$2y$10$EgLsNHiGOmW30BGMqwpI5ui8MHVvtitN4.OmhQliPrgZUoC/HN.Ey" WHERE medico.id = 1;

INSERT INTO medico(email, nome, senha) VALUES('ex2@gmail.com', 'Ana Carla', '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a');
SELECT DATE_FORMAT(data_criacao, "%d-%m-%Y") FROM medico AS date_formatted;
INSERT INTO horarios(id_medico, data_horario, horario_agendado) VALUES(1, '2021-04-12 18:00', 1);
SELECT * FROM horarios;
SELECT * FROM medico;
SELECT horarios.id id_horario, medico.id id_medico, medico.nome, GROUP_CONCAT(CONCAT(horarios.id, ',', DATE_FORMAT(horarios.data_horario, "%d-%m-%Y %H:%i"), ',', horarios.horario_agendado) SEPARATOR ';') data_horarios FROM horarios INNER JOIN medico ON horarios.id_medico = medico.id;

SELECT teste_fc.medico.id id_medico, teste_fc.medico.nome, horarios.data_horarios FROM teste_fc.medico LEFT JOIN (SELECT horarios.id_medico AS id_medico, GROUP_CONCAT(CONCAT(horarios.id, ',', DATE_FORMAT(horarios.data_horario, '%d-%m-%Y %H:%i'), ',', horarios.horario_agendado) SEPARATOR ';') AS data_horarios FROM teste_fc.horarios) horarios ON horarios.id_medico = teste_fc.medico.id;
UPDATE horarios SET horarios.horario_agendado = 0 WHERE horarios.id = 1;
