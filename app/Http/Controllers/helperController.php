<?php

namespace SistemaHAD\Http\Controllers;

use Illuminate\Http\Request;

use SistemaHAD\Http\Requests;
use SistemaHAD\Shift;
use DB;
use SistemaHAD\Http\Controllers\Controller;

class helperController extends Controller
{
    static function verificarMes($mes,$idempleado,$idobjetivo){
        // $turno = DB::table('shifts')->where('month', $mes)->get();
         $resultadoConsulta = Shift::where('month',$mes)->where('employee_id', $idempleado)->where('goal_id', $idobjetivo)->get();
        // echo $resultadoConsulta;


        if (count($resultadoConsulta) == 0) {
            // echo "no existe el turno mensual de ".$mes." se deberá crearlo";
            // echo "vacio";
            return true;
        }else {
            // return $resultadoConsulta;
            echo "no vacio";
            return false;
        }
    }


    // static function fechaElegidaMes($mes){
    //     switch ($mes) {
    //         case 'enero':
    //             return $mes = "january";
    //             break;
    //         case 'febrero':
    //             return $mes = "february";
    //             break;
    //         case 'marzo':
    //             return $mes = "march";
    //             break;
    //         case 'abril':
    //             return $mes = "april";
    //             break;
    //         case 'mayo':
    //             return $mes = "may";
    //             break;
    //         case 'junio':
    //             return $mes = "june";
    //             break;
    //         case 'julio':
    //             return $mes = "july";
    //             break;
    //         case 'agosto':
    //             return $mes = "august";
    //             break;
    //         case 'septiembre':
    //             return $mes = "september";
    //             break;
    //         case 'octubre':
    //             return $mes = "october";
    //             break;
    //         case 'noviembre':
    //             return $mes = "november";
    //             break;
    //         case 'diciembre':
    //             return $mes = "december";
    //             break;
    //
    //         default:
    //             return $mes = "enero";
    //             break;
    //     }
    // }
}
