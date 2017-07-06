

CREATE TRIGGER insert_historico_consultas after insert on grn_consultas
	for each row
	insert into grn_historico_consultas(
		  `fecha_accion`,   `accion`,     
		  `nro_consulta_new`,
		  `id_con_new`,
		  `usuario_new` ,
		  `especialidad_new`,
		  `fecha_new`,
		  `motivo_consulta_new`,
		  `enfermedad_actual_new`,
		  `examen_fisico_new`,
		  `diagnostico_new`,
		  `tratamiento_new`)
VALUES (NOW(), 'INSERT', 
		NEW.nro_consulta, NEW.id, NEW.usuario, NEW.especialidad, NEW.fecha,
		NEW.motivo_consulta, NEW.enfermedad_actual, NEW.examen_fisico, 
		NEW.diagnostico, NEW.tratamiento );


CREATE TRIGGER update_historico_consultas before update on grn_consultas
	for each row
	insert into grn_historico_consultas(
		`fecha_accion`,   `accion`,    
		`nro_consulta_ant`, 	`nro_consulta_new`,
		`id_con_ant`,	`id_con_new`,
		`usuario_ant`, 	`usuario_new`,
		`especialidad_ant`,	`especialidad_new`,
		`fecha_ant`,	`fecha_new`,
		`motivo_consulta_ant`,	`motivo_consulta_new`,
		`enfermedad_actual_ant`,	`enfermedad_actual_new`,
		`examen_fisico_ant`,	`examen_fisico_new`,
		`diagnostico_ant`,	`diagnostico_new`,
		`tratamiento_ant`,	`tratamiento_new`
 )
	VALUES (NOW(), 'UPDATE',
		OLD.nro_consulta,		NEW.nro_consulta, 
		OLD.id, 		NEW.id, 		
		OLD.usuario,		NEW.usuario,
		OLD.especialidad,		NEW.especialidad, 
		OLD.fecha,		NEW.fecha,
		OLD.motivo_consulta,		NEW.motivo_consulta, 
		OLD.enfermedad_actual,		NEW.enfermedad_actual, 
		OLD.examen_fisico, 	NEW.examen_fisico, 
		OLD.diagnostico, 		NEW.diagnostico, 
		OLD.tratamiento, 		NEW.tratamiento 
	);
	
	
	
	
	
CREATE TRIGGER delete_historico_consultas after delete on grn_consultas
	for each row
	insert into grn_historico_consultas(
		`fecha_accion`,   `accion`,    
		`nro_consulta_ant`, `id_con_ant`,	
		`usuario_ant`, 	`especialidad_ant`,			
		`fecha_ant`,	`motivo_consulta_ant`,	
		`enfermedad_actual_ant`,`examen_fisico_ant`,
		`diagnostico_ant`,	`tratamiento_ant`)
    VALUES (NOW(), 'DELETE', 
		OLD.nro_consulta, OLD.id, OLD.usuario, OLD.especialidad, OLD.fecha,
		OLD.motivo_consulta, OLD.enfermedad_actual, OLD.examen_fisico, 
		OLD.diagnostico,OLD.tratamiento);

	
	




CREATE TRIGGER insert_historico_paciente after insert on grn_historia_clinica
	for each row
	insert into grn_historico_hist_clinica(
  `fecha_accion`,   `accion`,
    `usuario_new`,
    `id_hc_new`,        `nombre_new`,      `apellido_new`,     
    `dni_new`,      `telefono_new`,    `fecha_new`,     
    `direccion_new`,      `ciudad_new`,      `fecha_nac_new`,     
    `lugar_nac_new`,      `estado_civil_new`,      `ocupacion_new`,      
    `grupo_sanguineo_new`,      `escolaridad_new`,      `email_new`,      
    `ant_personales_new`,      `ant_familiares_new`,      `alergias_new`)
VALUES (NOW(), 'INSERT', 
	NEW.usuario, NEW.id, NEW.nombre, NEW.apellido, NEW.dni,
	NEW.telefono, NEW.fecha, NEW.direccion, NEW.ciudad,
	NEW.fecha_nac, NEW.lugar_nac, NEW.estado_civil,
	NEW.ocupacion, NEW.grupo_sanguineo, NEW.escolaridad,
	NEW.email,  NEW.ant_personales, NEW.ant_familiares,
	NEW.alergias);




CREATE TRIGGER delete_historico_paciente after delete on grn_historia_clinica
	for each row
	insert into grn_historico_hist_clinica(
  `fecha_accion`,   `accion`,
    `usuario_ant`,    `id_hc_ant`,    
    `nombre_ant`,      `apellido_ant`, 
    `dni_ant`,      `telefono_ant`,
    `fecha_ant`,     `direccion_ant`,  
    `ciudad_ant`,      `fecha_nac_ant`, 
    `lugar_nac_ant`,      `estado_civil_ant`,  
    `ocupacion_ant`,      `grupo_sanguineo_ant`,  
    `escolaridad_ant`,      `email_ant`,  
    `ant_personales_ant`,      `ant_familiares_ant`,  
    `alergias_ant`)
    VALUES (NOW(), 'DELETE', 
		OLD.usuario, OLD.id, OLD.nombre, OLD.apellido, OLD.dni,
		OLD.telefono, OLD.fecha, OLD.direccion, OLD.ciudad,
		OLD.fecha_nac, OLD.lugar_nac, OLD.estado_civil,
		OLD.ocupacion, OLD.grupo_sanguineo, OLD.escolaridad,
		OLD.email, OLD.ant_personales, OLD.ant_familiares,
		OLD.alergias);



CREATE TRIGGER update_historico_paciente before update on grn_historia_clinica
	for each row
	insert into grn_historico_hist_clinica(
    `fecha_accion`, `accion`,    
    `usuario_ant`, `usuario_new`,    
    `id_hc_ant`,  `id_hc_new`,    
    `nombre_ant`,   `nombre_new`,    
    `apellido_ant`,   `apellido_new`,   
    `dni_ant`,`dni_new`,      
   `telefono_ant`, `telefono_new`,    
    `fecha_ant`, `fecha_new`,     
    `direccion_ant`, `direccion_new`,    
    `ciudad_ant`,      `ciudad_new`,      
    `fecha_nac_ant`,     `fecha_nac_new`,   
    `lugar_nac_ant`,     `lugar_nac_new`,     
    `estado_civil_ant`,      `estado_civil_new`,      
    `ocupacion_ant`,      `ocupacion_new`,      
    `grupo_sanguineo_ant`,      `grupo_sanguineo_new`,      
    `escolaridad_ant`,      `escolaridad_new`,     
    `email_ant`,      `email_new`,      
    `ant_personales_ant`,      `ant_personales_new`,      
    `ant_familiares_ant`,      `ant_familiares_new`,      
    `alergias_ant`,    `alergias_new`)
VALUES (NOW(), 'UPDATE', 	
	OLD.usuario,		NEW.usuario,
	OLD.id,		NEW.id,			
	OLD.nombre, 		NEW.nombre,
	OLD.apellido, 	NEW.apellido, 
	OLD.dni,		NEW.dni,
	OLD.telefono, 	NEW.telefono, 
	OLD.fecha, 	NEW.fecha, 
	OLD.direccion, 		NEW.direccion, 
	OLD.ciudad,		NEW.ciudad,
	OLD.fecha_nac, 		NEW.fecha_nac, 
	OLD.lugar_nac, 		NEW.lugar_nac, 
	OLD.estado_civil,	NEW.estado_civil,
	OLD.ocupacion, 		NEW.ocupacion, 
	OLD.grupo_sanguineo, 	NEW.grupo_sanguineo,
	OLD.escolaridad,	NEW.escolaridad,
	OLD.email, 		NEW.email, 
	OLD.ant_personales, 	NEW.ant_personales,
	OLD.ant_familiares,	NEW.ant_familiares,
	OLD.alergias,		NEW.alergias
);


