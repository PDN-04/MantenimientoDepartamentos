GRANT all privileges ON DAW204_DBdepartamentos.* TO "DAW204"@"%" IDENTIFIED BY "paso";
create database if not exists DAW204_DBdepartamentos;

use DAW204_DBdepartamentos;
create table Departamento (
CodDepartamento varchar(3) not null primary key,
DescDepartamento varchar(255) not null unique
)Engine=InnoDB;

create table Usuario (
CodUsuario varchar(8) not null primary key,
DescUsuario varchar(255) not null,
Password varchar(64) not null,
Perfil varchar(20) not null,
UltimaConexion varchar(20) not null,
ContadorAccesos varchar(20) not null
)Engine=InnoDB;