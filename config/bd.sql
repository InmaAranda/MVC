-- Active: 1750671266963@@127.0.0.1@3306@tienda_web
drop database  if exists tienda_web; 
--peligro SE USAN EN DESARROLLO PERO EN LA EXPLOTACIÓN SE COMENTA 

create database if not exists tienda_web
character set latin1 
collate latin1_spanish_ci;

use tienda_web;

create user 'root' --esto es peligroso pero la bbdd está corrupta y habría que desinstalar el xampp
identified by ''; --el profesor lo tiene con un usuario que no es root, pero a mí el xampp me daba error de corrupción de bbdd por lo que no lo hice

grant all PRIVILEGES on tienda_web.* to admin_tienda; --el usuario admin va a poder acceder a todo lo de su bbdd pero no podrá entrar en otras por tienda_web.* (a toda la bbdd tienda web)

create table users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    user_name varchar(25) not NULL,
    email varchar(80) not NULL unique, -- UNIQUE-> sirve para que el usuario no se registre con el mismo correo
    password VARCHAR(255) NOT NULL
);





