drop database if exists db_proyecto;
create database db_proyecto;
use db_proyecto;

-- Creación de tabla usuario, que será para todos los usuarios deudores
drop table if exists my_user;
create table my_user (id int not null auto_increment, username varchar(25), 
password_1 varchar(25), fName varchar(50), pNumber varchar(50),
primary key(id));
insert into my_user values
(1, "user", "user", "Esau Ruiz", 3121685861);





