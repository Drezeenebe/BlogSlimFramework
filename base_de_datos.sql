DROP DATABASE IF EXISTS blog_slim;
CREATE DATABASE blog_slim CHARACTER SET utf8mb4;
USE blog_slim;

CREATE TABLE posts(
    id SMALLINT unsigned not null auto_increment primary key,
    titulo VARCHAR(100) NOT NULL,
    texto TEXT,
    fecha_creacion DATETIME,
    estado TINYINT(1) NOT NULL DEFAULT 1 
);

CREATE TABLE usuarios(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    EMAIL VARCHAR(100) NOT NULL UNIQUE,
    PASSWORD VARCHAR(40) NOT NULL,
    FECHA_CREACION DATETIME,
    ESTADO TINYINT(1) NOT NULL DEFAULT 1 
);

CREATE TABLE comentarios(
    id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    comentario TEXT,
    fecha_creacion DATETIME,
    estado TINYINT(1) NOT NULL DEFAULT 1,
    fk_post SMALLINT UNSIGNED NOT NULL,
    fk_usuario INT UNSIGNED NOT NULL,

    FOREIGN KEY(fk_post) REFERENCES posts(id)
    ON DELETE CASCADE,
    FOREIGN KEY(fk_usuario) REFERENCES usuarios(id)
);

INSERT INTO 
    usuarios
SET
    email='pablo@gmail.com',
    password=sha1('1234'),
    fecha_creacion=NOW();

INSERT INTO posts(titulo,texto,fecha_creacion)
VALUES  ('Primer Post','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta unde incidunt sit nobis ipsum saepe. Iusto iure unde molestias. Aliquam quaerat nisi distinctio eveniet rerum quasi! Sint aut ad fugiat.',NOW()),
        ('Segundo Post','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta unde incidunt sit nobis ipsum saepe. Iusto iure unde molestias. Aliquam quaerat nisi distinctio eveniet rerum quasi! Sint aut ad fugiat.',NOW()),
        ('Tercero Post','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta unde incidunt sit nobis ipsum saepe. Iusto iure unde molestias. Aliquam quaerat nisi distinctio eveniet rerum quasi! Sint aut ad fugiat.',NOW());


INSERT INTO comentarios
SET
comentario='Comentario de post',
fecha_creacion=NOW(),
fk_post=1,
fk_usuario=1;