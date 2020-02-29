drop database if exists db_proyecto;
create database db_proyecto;
use db_proyecto;

-- Creación de tabla admin, que será para el propietario/admin
drop table if exists admin;
create table admin(id int not null auto_increment, username varchar(25), passcode varchar(25),
primary key(id));

-- Creación de fila para pruebas
insert into admin values
(1, "root", "root"),
(2, 1234554321 , "qweRty789");

-- Creación de tabla usuario, que será para todos los usuarios deudores
drop table if exists my_user;
create table my_user (id int not null auto_increment, username varchar(25), 
passcode varchar(25), fName varchar(50), email varchar(50),
primary key(id));
insert into my_user values
(1, "user", "user", "Esau Ruiz", "eruiz7@ucol.mx");





