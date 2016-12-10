create database notausuario default character set utf8 collate utf8_unicode_ci;


create user proyecto@localhost identified by 'franbro';


grant all on notausuario.* to proyecto@localhost;


flush privileges;

use notausuario;

create table usuario (
    email varchar(150) not null primary key,
    password varchar(256) not null,
    falta date not null,
    tipo enum('administrador', 'avanzado', 'usuario') not null default 'usuario',
    estado tinyint,
    nombre varchar(100) not null,
    apellidos varchar(100) not null,
    direccion varchar(256),
    movil int(9)
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table grupo (
    id int auto_increment primary key,
    nombre varchar(150) not null default 'personal',
    tipo enum('personal', 'privado', 'publico') not null default 'personal'
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table grupousuario (
    idgrupo int not null,
    email varchar(150) not null,
    estado tinyint default '1',
    relacion enum('dueño', 'miembro', 'invitado') not null default 'dueño',
    PRIMARY KEY (idgrupo, email),
    FOREIGN KEY (idgrupo) REFERENCES grupo(id) ON DELETE CASCADE,
    FOREIGN KEY (email) REFERENCES usuario(email) ON DELETE CASCADE
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table nota (
    id int auto_increment primary key,
    titulo varchar(100),
    idgrupo int not null,
    texto varchar(1000),
    estado enum('normal', 'alarma') not null default 'normal',
    fechaAlarma date,
    fechaCreacion date not null,
    tipo enum('normal', 'media') not null default 'normal',
    visible tinyint(1),
    FOREIGN KEY (idgrupo) REFERENCES grupo(id) ON DELETE CASCADE
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table media (
    id int auto_increment primary key,
    idnota int not null,
    tipo enum('video', 'foto', 'sonido', 'lista'),
    url varchar(2000),
    texto varchar(100),
    FOREIGN KEY (idnota) REFERENCES nota(id) ON DELETE CASCADE
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

