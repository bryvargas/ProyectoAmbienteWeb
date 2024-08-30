
CREATE DATABASE proyecto_web;

USE proyecto_web;

CREATE TABLE PROVINCIA(
	id_PROVINCIA INT NOT NULL auto_increment,
	NOMBRE VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_PROVINCIA)
);


CREATE TABLE CANTON(
	id_CANTON INT NOT NULL auto_increment,
	NOMBRE VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_CANTON)
);


CREATE TABLE DISTRITO(
	id_DISTRITO INT NOT NULL auto_increment,
	NOMBRE VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_DISTRITO)
);


CREATE TABLE especialidad (           
    id_especialidad int not null auto_increment,
    nombre varchar(50) not null,
    descripcion_puesto varchar(100) not null,
    PRIMARY KEY (id_especialidad)
);


CREATE TABLE empleado (           
    id_empleado int not null auto_increment,
    nombre varchar(50) not null,
    apellidos varchar(50) not null,
    id_especialidad int not null,
    correo INT NOT NULL,
    telefono INT NOT NULL,
    genero varchar(10),
    edad int not null,
    id_PROVINCIA int NOT NULL,
    id_CANTON INT NOT NULL,
    id_DISTRITO INT NOT NULL,
    direccion varchar(40),
    PRIMARY KEY (id_empleado),
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad),
    FOREIGN KEY (id_PROVINCIA) REFERENCES PROVINCIA(id_PROVINCIA),
    FOREIGN KEY (id_CANTON) REFERENCES CANTON(id_CANTON),
    FOREIGN KEY (id_DISTRITO) REFERENCES DISTRITO(id_DISTRITO)
    );


CREATE TABLE paciente (           
    cedula int not null,
    nombre varchar(50) not null,
    apellidos varchar(50) not null,
    edad int not null,
    genero varchar(10),
    id_empleado int not null,
    correo INT NOT NULL,
    telefono INT NOT NULL,
    id_PROVINCIA int NOT NULL,
    id_CANTON INT NOT NULL,
    id_DISTRITO INT NOT NULL,
    direccion varchar(40),
    PRIMARY KEY (cedula),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
    FOREIGN KEY (id_PROVINCIA) REFERENCES PROVINCIA(id_PROVINCIA),
    FOREIGN KEY (id_CANTON) REFERENCES CANTON(id_CANTON),
    FOREIGN KEY (id_DISTRITO) REFERENCES DISTRITO(id_DISTRITO)
    );


    CREATE TABLE cita(
        id_cita int not null auto_increment,
        id_empleado int not null,
        cedula int not null,
        fecha date not null,
        hora varchar(10) not null, 
        PRIMARY KEY (id_cita),
        FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado),
        FOREIGN KEY (cedula) REFERENCES paciente(cedula)
    );


    CREATE TABLE Consulta(
        id_consulta int not null auto_increment,
        id_cita int not null,
        descripcion_consulta varchar(100) not null,
        PRIMARY KEY (id_consulta),
        FOREIGN KEY (id_cita) REFERENCES cita(id_cita)
    );