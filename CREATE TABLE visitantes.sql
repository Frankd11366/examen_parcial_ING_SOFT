CREATE TABLE visitas (

    vis_codigo SERIAL PRIMARY KEY, 
    vis_nombres VARCHAR(50),
    vis_apellidos VARCHAR (50),
    vis_procedencia VARCHAR (50),
    vis_fecha_ingreso VARCHAR (20),
    vis_fecha_salio VARCHAR (20),
    vis_razon VARCHAR (50),
);