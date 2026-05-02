<?php

namespace App\util;

class FechaParser
{
    public function __construct()
    {
    }

    public static function parse($fecha)
    {
       /* $dia = substr($fecha, 0, 2);
        $mes = substr($fecha, 3, 2);
        $ano = substr($fecha, 6, 4);*/
        $aux = explode('-', $fecha);
        $fecha = $aux[2].'-'.$aux[1].'-'.$aux[0];
        $dia = substr($fecha, 0, 2);
        $mes = substr($fecha, 3, 2);
        $ano = substr($fecha, 6, 4);

        $day = date('l', strtotime($fecha));

        switch ($day) {
            case "Monday": 		$day = "Lunes";			break;
            case "Tuesday": 	$day = "Martes";		break;
            case "Wednesday":	$day = "Miércoles";		break;
            case "Thursday": 	$day = "Jueves";		break;
            case "Friday": 		$day = "Viernes";		break;
            case "Saturday": 	$day = "Sábado";		break;
            case "Sunday": 		$day = "Domingo";		break;
        }

        switch ($mes) {
            case "01": $mes = "Enero";			break;
            case "02": $mes = "Febrero";		break;
            case "03": $mes = "Marzo";			break;
            case "04": $mes = "Abril";			break;
            case "05": $mes = "Mayo";			break;
            case "06": $mes = "Junio";			break;
            case "07": $mes = "Julio";			break;
            case "08": $mes = "Agosto";			break;
            case "09": $mes = "Septiembre";		break;
            case "10": $mes = "Octubre";		break;
            case "11": $mes = "Noviembre";		break;
            case "12": $mes = "Diciembre";		break;
        }

        $result = $day." ". intval($dia) . " de " . $mes . " de " . $ano;

        return $result;
    }

    public static function simpelParse($fecha)
    {
        $aux = explode('-', $fecha);
        $fecha = $aux[2].'-'.$aux[1].'-'.$aux[0];
        $dia = substr($fecha, 0, 2);
        $mes = substr($fecha, 3, 2);

        $day = date('l', strtotime($fecha));

        switch ($day) {
            case "Monday": 		$day = "Lunes";			break;
            case "Tuesday": 	$day = "Martes";		break;
            case "Wednesday":	$day = "Miércoles";		break;
            case "Thursday": 	$day = "Jueves";		break;
            case "Friday": 		$day = "Viernes";		break;
            case "Saturday": 	$day = "Sábado";		break;
            case "Sunday": 		$day = "Domingo";		break;
        }

        switch ($mes) {
            case "01": $mes = "Enero";			break;
            case "02": $mes = "Febrero";		break;
            case "03": $mes = "Marzo";			break;
            case "04": $mes = "Abril";			break;
            case "05": $mes = "Mayo";			break;
            case "06": $mes = "Junio";			break;
            case "07": $mes = "Julio";			break;
            case "08": $mes = "Agosto";			break;
            case "09": $mes = "Septiembre";		break;
            case "10": $mes = "Octubre";		break;
            case "11": $mes = "Noviembre";		break;
            case "12": $mes = "Diciembre";		break;
        }

        $result = $day." ". intval($dia) . " de " . $mes;
        return $result;
    }
}