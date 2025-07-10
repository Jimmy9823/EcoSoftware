create database eco_software;
use eco_software;


-- No puse tipos de datos time o datetime, en su lugar son varchar
-- Inserts para pruebas, no ejecutar sin crear toda la base de datos

-- _______________________________________
-- Tabla 'Padre' _________________________________
-- _______________________________________

CREATE TABLE rol (
    id INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(255),
    descripcion TEXT,
    tipo ENUM ("Administrador","Ciudadano","Empresa","Reciclador"), -- Tipo de rol
    estado BOOLEAN -- Activo o inactivo
);
select * from rol;

CREATE TABLE usuario ( -- Con los datos de todos los roles
    id INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    rol_id int, -- clave foranea
    nombre VARCHAR(45) NOT NULL,
    contraseña VARCHAR(255) NOT NULL unique,
    correo VARCHAR(250) unique,
    cedula INT unique,
    telefono INT,
    NIT INT,
    direccion INT,
    barrio VARCHAR(250),
    localidad VARCHAR(250),
    zona_de_trabajo VARCHAR(250), -- En caso de no tener ruta
    tipo_rol VARCHAR(250), -- ("Administrador","Ciudadano","Empresa","Reciclador"),
   
    horario varchar(250),
    certificaciones varchar(250),
    estado boolean default true,
    FOREIGN KEY (rol_id) REFERENCES Rol(id) ON DELETE CASCADE
);
alter table usuario add cantidad_minina tinyint;
select * from usuario;

-- _______________________________________
-- Puntos de Reciclaje
-- _______________________________________

CREATE TABLE punto_de_reciclaje (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    ubicacion VARCHAR(255),
    -- entrada DATETIME DEFAULT NULL, -- A que se refiere esto?
    -- salida DATETIME DEFAULT NULL, - Si se refiere al horario lo pongo abajo
    horario varchar(250), -- Lo pongo varchar para facilidad de manejo
    tipo_de_residuo ENUM('Plástico', 'Vidrio', 'Papel', 'Metal', 'Orgánico',"Electronicos", "Aceite", "otro") DEFAULT NULL,
    otro varchar(250), -- Espacio para declarar otro tipo de residuo y quede completo el punto
    -- tipo de residuo puede ser multiple, un punto puede recibir papel y plastico
    usuario_id int,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE
    
);
alter table punto_de_reciclaje add latitud decimal(10,8) default null;
alter table punto_de_reciclaje add longitud decimal(10,8) default null;
ALTER TABLE punto_de_reciclaje ADD COLUMN imagen VARCHAR(255) DEFAULT NULL;


 -- Tabla intermedia Usuario consulta punto de reciclaje
CREATE TABLE usua_consul_punto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    punto_de_reciclaje_id INT,
    fecha_de_consulta varchar(250),
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (punto_de_reciclaje_id) REFERENCES punto_de_reciclaje(id) ON DELETE CASCADE
);

-- _______________________________________
-- Solicitud de recolección
-- _______________________________________
-- Solicitud del ciudadano

-- Realiza la solicitud / Notificacion a los recolectores / Doble aceptacion o algoritmo que decida aleatoriamente
CREATE TABLE solicitud_de_recoleccion ( -- Pendiente////////////___________
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo_residuo VARCHAR(250) NOT NULL,
    cantidad VARCHAR(250) NOT NULL, -- String para especificar peso y volumen
    estado_peticion ENUM('Pendiente', 'En Proceso','Finalizada', 'Cancelada') DEFAULT 'Pendiente',
    descripccion varchar(250), -- Detalles de la solicitud
    ubicacion VARCHAR(100) NOT NULL, -- Direccion de la solicitud o del ciudadano
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);
select*from solicitud_de_recoleccion;
--
-- Respuesta a solicitud del ciudadano
CREATE TABLE recoleccion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    estado enum ("Aceptada", "Rechazada", "Finalizada"), --
    fecha_y_hora_recogida varchar(250),
    solicitud_id INT, -- llave foranea
    decripcion varchar(250),
    FOREIGN KEY (solicitud_id) REFERENCES solicitud_de_recoleccion(id) ON DELETE CASCADE
);
-- Se conecta con solicitud_de_recoleccion para saber el punto de inicio y con recoleccion para el destino
CREATE TABLE ruta (
    id INT PRIMARY KEY AUTO_INCREMENT,
    distancia VARCHAR(250),
    tiempo_estimado varchar(250),
    solicitud_id INT,
    recoleccion_id int,
    ubicacion_actual varchar(250), -- Ubicacion en tiempo real del reciclador
    FOREIGN KEY (solicitud_id) REFERENCES solicitud_de_recoleccion(id) ON DELETE CASCADE,
FOREIGN KEY (recoleccion_id) REFERENCES solicitud_de_recoleccion(id) ON DELETE CASCADE
);



-- _______________________________________
-- Cursos y capacitaciones
-- _______________________________________

CREATE TABLE capacitacion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    descripcion TEXT,
    fecha DATE,
    duracion varchar(50),
    imagen VARCHAR(255)
);

CREATE TABLE modulo(
id_capacitacion int primary key auto_increment,
    duracion varchar(250),
    descripcion text,
    FOREIGN KEY (id_capacitacion) REFERENCES capacitacion(id) ON DELETE CASCADE
); --
-- tabla intermedia
CREATE TABLE inscripcion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fecha_de_inscripcion DATE,
    estado_curso ENUM ('Inscrito', 'Finalizado', 'En proceso', 'cancelado'),
    curso_id INT,
    usuario_id INT,
    FOREIGN KEY (curso_id) REFERENCES capacitacion(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE
);
-- Aqui se guarda el progreso del curso despues de que el usuario se inscriba
create table progreso(
id int primary key auto_increment,
progreso_del_curso varchar(250),
modulos_completados varchar(250),
tiempo_invertido varchar(250),
curso_id INT,
usuario_id INT,
FOREIGN KEY (curso_id) REFERENCES capacitacion(id) ON DELETE CASCADE,
FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE
);
-- Blog, de clase "noticia" Diagrama de clases
create table blog(
id int primary key auto_increment,
nombre varchar(250),
descripcion varchar(250),
contenido varchar(250),
reacciones enum("like","dislike"),
vistas int,
comentarios text,
blog_id int,
usuario_id int,
estado boolean, -- En caso de que el administrador tener que eliminar una publicacion
FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);
insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Jaime", "jai@gmail.com", "12345","Administrador");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Paula", "pau@gmail.com", "936438","Ciudadano");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Dana", "dana@gmail.com", "789654","Reciclador");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("ecobot", "eco@gmail.com", "685856","Empresa");

insert into rol(nombre, tipo, estado) values ("Administrador", "Administrador", true);
insert into rol(nombre, tipo, estado) values ("Ciudadano", "Ciudadano", true);
insert into rol(nombre, tipo, estado) values ("Empresa", "Empresa", true);
insert into rol(nombre, tipo, estado) values ("Reciclador", "Reciclador", true);

INSERT INTO punto_de_reciclaje (id, nombre, horario, tipo_de_residuo, otro, latitud, longitud) VALUES
(1, 'Punto Verde Centro Mayor', 'Lunes a domingo 10:00 - 20:00', 'Plástico', '', 4.60674200, -74.12494100),
(2, 'Punto de Reciclaje Virrey', 'Lunes a sábado 08:00 - 18:00', 'Vidrio', '', 4.67355100, -74.05252300),
(3, 'Punto de Reciclaje Parque 93', 'Lunes a domingo 09:00 - 19:00', 'Papel', '', 4.67615100, -74.04898700),
(4, 'Punto de Reciclaje Compensar Avenida 68', 'Lunes a viernes 08:00 - 17:00', 'Metal', '', 4.65587000, -74.09713000);
select*from punto_de_reciclaje;
select *from solicitud_de_recoleccion;
insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Jaime", "jai@gmail.com", "12345","Administrador");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Paula", "pau@gmail.com", "936438","Ciudadano");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("Dana", "dana@gmail.com", "789654","Reciclador");

insert into usuario(nombre, correo, contraseña,tipo_rol)
values ("ecobot", "eco@gmail.com", "685856","Empresa");

insert into rol(nombre, tipo) values ("Administrador", "Administrador");
insert into rol(nombre, tipo) values ("Ciudadano", "Ciudadano");
insert into rol(nombre, tipo) values ("Empresa", "Empresa");
insert into rol(nombre, tipo) values ("Reciclador", "Reciclador");
INSERT INTO usuario (rol_id, nombre, contraseña, correo, cedula, telefono, tipo_rol, estado) VALUES
(1, 'Admin Juan', 'admin123', 'admin1@eco.com', 1001001, 3101111111, 'Administrador', true),
(1, 'Admin Laura', 'admin456', 'admin2@eco.com', 1001002, 3102222222, 'Administrador', true),
(1, 'Admin Pedro', 'admin789', 'admin3@eco.com', 1001003, 3103333333, 'Administrador', true);

-- Usuarios Ciudadanos
INSERT INTO usuario (rol_id, nombre, contraseña, correo, cedula, telefono, direccion, barrio, localidad, tipo_rol, estado) VALUES
(2, 'Carlos Martínez', 'clave123', 'carlos@correo.com', 2002001, 3114444444, 11111, 'Bosa', 'Bogotá', 'Ciudadano', true),
(2, 'Ana Gómez', 'clave456', 'ana@correo.com', 2002002, 3115555555, 22222, 'Kennedy', 'Bogotá', 'Ciudadano', true),
(2, 'Luis Rodríguez', 'clave789', 'luis@correo.com', 2002003, 3116666666, 33333, 'Chapinero', 'Bogotá', 'Ciudadano', true),
(2, 'María Torres', 'clave147', 'maria@correo.com', 2002004, 3117777777, 44444, 'Suba', 'Bogotá', 'Ciudadano', true);

-- Usuarios Empresa
INSERT INTO usuario (rol_id, nombre, contraseña, correo, nit, telefono, direccion, barrio, localidad, cantidad_minina, horario, tipo_rol, estado) VALUES
(3, 'Recicla S.A.', 'empresa123', 'empresa1@eco.com', 9009001, 3201111111, 12345, 'La Candelaria', 'Bogotá', 50, '8am - 5pm', 'Empresa', true),
(3, 'Verde LTDA', 'empresa456', 'empresa2@eco.com', 9009002, 3202222222, 23456, 'Fontibón', 'Bogotá', 60, '9am - 4pm', 'Empresa', true),
(3, 'Eco Solutions', 'empresa789', 'empresa3@eco.com', 9009003, 3203333333, 34567, 'Engativá', 'Bogotá', 70, '7am - 3pm', 'Empresa', true);

-- Usuarios Recicladores
INSERT INTO usuario (rol_id, nombre, contraseña, correo, cedula, telefono, zona_de_trabajo, cantidad_minina, horario, tipo_rol, estado, certificaciones) VALUES
(4, 'Jorge Recicla', 'recicla123', 'jorge@eco.com', 3003001, 3121111111, 'Zona Norte', 30, '6am - 2pm', 'Reciclador', true, 'Certificado básico'),
(4, 'Lucía Verde', 'recicla456', 'lucia@eco.com', 3003002, 3122222222, 'Zona Centro', 25, '7am - 1pm', 'Reciclador', true, 'Certificado intermedio'),
(4, 'Oscar Ruiz', 'recicla789', 'oscar@eco.com', 3003003, 3123333333, 'Zona Sur', 35, '8am - 4pm', 'Reciclador', true, 'Certificado avanzado'),
(4, 'Marta Rivera', 'recicla159', 'marta@eco.com', 3003004, 3124444444, 'Zona Oeste', 20, '9am - 5pm', 'Reciclador', true, 'Certificado básico');

INSERT INTO punto_de_reciclaje (id, nombre, horario, tipo_de_residuo, otro, latitud, longitud) VALUES
(1, 'Punto Verde Centro Mayor', 'Lunes a domingo 10:00 - 20:00', 'Plástico', '', 4.60674200, -74.12494100),
(2, 'Punto de Reciclaje Virrey', 'Lunes a sábado 08:00 - 18:00', 'Vidrio', '', 4.67355100, -74.05252300),
(3, 'Punto de Reciclaje Parque 93', 'Lunes a domingo 09:00 - 19:00', 'Papel', '', 4.67615100, -74.04898700),
(4, 'Punto de Reciclaje Compensar Avenida 68', 'Lunes a viernes 08:00 - 17:00', 'Metal', '', 4.65587000, -74.09713000);
select*from punto_de_reciclaje;
 select* from usuario;
 -- drop database eco_software;
-- DELETE FROM punto_de_reciclaje WHERE id = 12;
