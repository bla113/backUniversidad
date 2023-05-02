<?php

date_default_timezone_set('UTC');

require ('controladores/plantilla.controlador.php');
require ('controladores/correo.controlador.php');
require ('controladores/estudiante.controlador.php');
require ('controladores/configuaracion.controlador.php');
require ('controladores/usuarios.controlador.php');
require('controladores/carrera.controlador.php');
require('controladores/profesor.controlador.php');
require('controladores/materia.controlador.php');
require('controladores/horario.controlador.php');
require('controladores/aula.controlador.php');
require('controladores/factura.controlador.php');
require('controladores/oferta-matricula.controlador.php');


require('modelos/configuracion.modelo.php');
require('modelos/estudiante.modelo.php');
require('modelos/usuarios.modelo.php');
require('modelos/carrera.modelo.php');
require('modelos/profesor.modelo.php');
require('modelos/materia.modelo.php');
require('modelos/horario.modelo.php');
require('modelos/aula.modelo.php');
require('modelos/cuatrimestre.modelo.php');
require('modelos/oferta-matricula.modelo.php');
require('modelos/factura.modelo.php');


$plantilla=new ControladorPlantilla();
$plantilla->ctrPlantilla();