CREATE TABLE Horario(
  id_tren_pk_fk INT (8),
  id_estacion_fk int (8),
  horas TIME ,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_tren_pk_fk), -- Clave compuesta
  FOREIGN KEY (id_tren_pk_fk) REFERENCES Tren(id_tren_pk), -- Clave foránea
  FOREIGN KEY (id_estacion_fk) REFERENCES Estacion(id_estacion_pk) -- Otra clave foránea
);