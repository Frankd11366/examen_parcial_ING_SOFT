CREATE TABLE visitantes (

    vis_codigo SERIAL PRIMARY KEY, 
    vis_nombres VARCHAR(30),
    vis_apellidos VARCHAR (35),
    vis_procedencia VARCHAR (35),
    vis_fecha_ingreso DATETIME,
    vis_fecha_salio DATETIME,
    vis_razon VARCHAR (55),
);