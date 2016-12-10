create database notas default character set utf8 collate utf8_unicode_ci;

create user gatouser@localhost identified by 'gatopassword';

grant all on gatosdatabase.* to gatouser@localhost;

flush privileges;

use gatosdatabase;

create table gato (
    id int auto_increment primary key,
    nombre varchar(30),
    raza varchar(20) null,
    color varchar(20) null
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;

create table usuario (
    email varchar(150) not null primary key,
    password varchar(256) not null,
    falta date not null,
    tipo enum('administrador', 'avanzado', 'usuario') not null default 'usuario',
    estado tinyint
) engine=innodb  default charset=utf8 collate=utf8_unicode_ci;