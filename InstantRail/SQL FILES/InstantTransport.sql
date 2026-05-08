

CREATE TABLE ESTACION(
  id_estacion_pk INT(8),
  nombre_estacion VARCHAR(10) NOT NULL,
  pueblo VARCHAR(10) NOT NULL,
  estado ENUM('Activa', 'Inactiva') NOT NULL,
  PRIMARY KEY(id_estacion_pk)
);
CREATE TABLE CUENTA(
  nombre_usuario_pk VARCHAR(20),
  apellido VARCHAR(20),
  emeil  VARCHAR(20),
  fecha_nacimiento DATE,
  student_status ENUM('Activo', 'Inactivo') NOT NULL,
  disabilty_status ENUM('si', 'no') NOT NULL,
  Password text (20),
  tipo_cuenta ENUM('Admin', 'User') NOT NULL,
  PRIMARY KEY(nombre_usuario_pk)
);
CREATE TABLE TREN(
  id_tren_pk INT(8),
  id_estacion_fk INT(8),
  estado ENUM('Activa', 'Inactiva') NOT NULL,
  PRIMARY KEY(id_tren_pk),
  FOREIGN KEY(id_estacion_fk) REFERENCES ESTACION(id_estacion_pk)
);
CREATE TABLE BOLETO(
  id_boleto_pk INT(8),
  id_tren_fk INT(8),
  nombre_usuario_fk VARCHAR(20),
  precio DECIMAL(10, 2),
  fecha_compra DATE NOT NULL,
  PRIMARY KEY(id_boleto_pk),
  FOREIGN KEY(id_tren_fk) REFERENCES TREN(id_tren_pk),
  FOREIGN KEY(nombre_usuario_fk) REFERENCES CUENTA(nombre_usuario_pk)
  );

CREATE TABLE Horario(
  id_tren_pk_fk INT (8),
  id_estacion_fk int (8),
  horas TIME ,
  fecha DATETIME,
    PRIMARY KEY (id_tren_pk_fk, id_estacion_fk), -- Clave compuesta
  FOREIGN KEY (id_tren_pk_fk) REFERENCES Tren(id_tren), -- Clave foránea
  FOREIGN KEY (id_estacion_fk) REFERENCES Estacion(id_estacion) -- Otra clave foránea
);