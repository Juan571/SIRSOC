<?php
$fecha=$_POST['fecha'];
$year = date('Y');
$week = date('W');
$$fecha_actual = date("yyyy-")

$fechaInicioSemana  = date('d-m-Y', strtotime($year . 'W' . str_pad($week , 2, '0', STR_PAD_LEFT)));
$fecha_viernes = date('d-m-Y', strtotime($fechaInicioSemana.' 4 day')); //Viernes

$numeroSemana = date("W"); 
$out = array("fecha_Actual" => $arr);
echo $fecha;


?>