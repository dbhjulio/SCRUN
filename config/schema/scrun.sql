DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
 id 			INT 			NOT NULL AUTO_INCREMENT,
 nome 			VARCHAR(100) 	NOT NULL,
 email 			VARCHAR(100) 	NOT NULL,
 municipio_id 	INT 			NOT NULL DEFAULT 3106200,
 senha 			VARCHAR(100)	NOT NULL,
 status			INT				NOT NULL DEFAULT 1,
 criado	 		DATETIME		NOT NULL,
 modificado 	DATETIME		NOT NULL,

 PRIMARY KEY (id),
 INDEX 	i_nome (nome ASC),
 INDEX 	i_email (email ASC),
 INDEX 	i_municipio_id (municipio_id ASC),
 INDEX 	i_status (status ASC),
 INDEX 	i_modificado (modificado ASC)

);

DROP TABLE IF EXISTS perfis;
CREATE TABLE perfis (
 id 			INT 			NOT NULL AUTO_INCREMENT,
 nome 			VARCHAR(30) 	NOT NULL,

 PRIMARY 		KEY (id),
 INDEX 			i_nome (nome ASC)
);

DROP TABLE IF EXISTS perfis_usuarios;
CREATE TABLE perfis_usuarios (
 id 		INT 				NOT NULL AUTO_INCREMENT,
 perfil_id 	INT 				NOT NULL DEFAULT 0,
 usuario_id	INT 				NOT NULL DEFAULT 0,

 PRIMARY 	KEY 		(id),
 FOREIGN    KEY         perfil_key(perfil_id) REFERENCES perfis(id),
 FOREIGN    KEY         usuario_key(usuario_id) REFERENCES usuarios(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci;

DROP TABLE IF EXISTS municipios;
CREATE TABLE municipios (
 id 		INT 				NOT NULL AUTO_INCREMENT,
 nome 		VARCHAR(100) 		NOT NULL,
 uf 		VARCHAR(2) 			NOT NULL,
 codi_estd 	INT 				NOT NULL DEFAULT '1',
 desc_estd	VARCHAR(100)		NOT NULL,

 PRIMARY 	KEY (id),
 INDEX 		i_nome (nome ASC)

);

INSERT INTO perfis (id,nome) VALUES (1,'ADMINISTRADOR');
INSERT INTO perfis (id,nome) VALUES (2,'GERENTE');
INSERT INTO perfis (id,nome) VALUES (3,'USUÁRIO');
INSERT INTO perfis (id,nome) VALUES (4,'VISITANTE');

INSERT INTO usuarios (id,nome,email,status,municipio_id,criado,modificado) VALUES (1,'Administrador Sistema','adrianosql@yahoo.com.br',1,3106200,SYSDATE(),SYSDATE());
INSERT INTO usuarios (id,nome,email,status,municipio_id,criado,modificado) VALUES (2,'Adriano Carneiro de Moura','adrianodemoura@gmail.com',0,2304103,SYSDATE(),SYSDATE());

INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (1,1);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (1,2);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (1,3);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (1,4);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (2,2);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (2,3);
INSERT INTO perfis_usuarios (usuario_id,perfil_id) VALUES (2,4);
