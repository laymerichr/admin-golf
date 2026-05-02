<?php

namespace App\util;

use App\Models\HomePage\FedTerritoriales;

class FederacionParser
{
    public function __construct()
    {
    }

    public static function parse($clubCode)
    {
        $idFed = self::getIdFed($clubCode);
        $objFed = FedTerritoriales::where('IdFed', $idFed)->first();
        $Logo_Fed_Territorial=asset('assets/img/regiones'.'/'.self::getFedImg($idFed));
        $Capital="Albacete";
        $Nombre_Fed = "ESCUELA DE PRUEBAS";

        if($idFed=="RL00"){
            $Capital="Logro&ntilde;o";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE LA RIOJA";
        }

        if($idFed=="8800"){
            $Capital="Guadalajara";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE CASTILLA LA MANCHA";
        }

        if($idFed=="GC00"){
            $Capital="A Coru&ntilde;a";
            $Nombre_Fed = "FEDERACI&Oacute;N GALLEGA DE GOLF";
        }

        if($idFed=="7700"){
            $Capital="Valladolid";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF CASTILLA Y LE&Oacute;N";
        }

        if($idFed=="4400"){
            $Capital="Pamplona";
            $Nombre_Fed = "FEDERACI&Oacute;N NAVARRA DE GOLF";
        }

        if($idFed=="BP00"){
            $Capital="Palma de Mallorca";
            $Nombre_Fed = "FEDERACI&Oacute;N BALEAR DE GOLF";
        }

        if($idFed=="1100"){
            $Capital="Santander";
            $Nombre_Fed = "FEDERACI&Oacute;N C&Aacute;NTABRA DE GOLF";
        }

        if($idFed=="AM00"){
            $Capital="M&aacute;laga";
            $Nombre_Fed = "REAL FEDERACI&Oacute;N ANDALUZA DE GOLF";
        }

        if($idFed=="MM00"){
            $Capital="Murcia";
            $Nombre_Fed = "FEDERACI&Oacute;N MURCIANA DE GOLF";
        }

        if($idFed=="LV00"){
            $Capital="Valencia";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE LA COMUNIDAD VALENCIANA";
        }

        if($idFed=="CE00"){
            $Capital="Ceuta";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE CEUTA";
        }

        if($idFed=="0200"){
            $Capital="Gij&oacute;n";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DEL PRINCIPADO DE ASTURIAS";
        }

        if($idFed=="VB00"){
            $Capital="San Sebasti&aacute;n";
            $Nombre_Fed = "FEDERACI&Oacute;N VASCA DE GOLF";
        }

        if($idFed=="CP00"){
            $Capital="Santa Cruz de Tenerife";
            $Nombre_Fed = "FEDERACI&Oacute;N CANARIA DE GOLF";
        }

        if($idFed=="ML00"){
            $Capital="Melilla";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE MELILLA";
        }

        if($idFed=="CB00"){
            $Capital="Barcelona";
            $Nombre_Fed = "FEDERACI&Oacute;N CATALANA DE GOLF";
        }

        if($idFed=="9900"){
            $Capital="C&aacute;ceres";
            $Nombre_Fed = "FEDERACI&Oacute;N EXTREME&Ntilde;A DE GOLF";
        }

        if($idFed=="0100"){
            $Capital="Zaragoza";
            $Nombre_Fed = "FEDERACI&Oacute;N ARAGONESA DE GOLF";
        }

        if($idFed=="CM00"){
            $Capital="Madrid";
            $Nombre_Fed = "FEDERACI&Oacute;N DE GOLF DE MADRID";
        }

        $result = [
            'logo'=>$Logo_Fed_Territorial,
            'capital'=>$Capital,
            'nombre'=>$Nombre_Fed,
            'presidente'=>$objFed->Presidente,
            'firma'=>asset('assets/img/firmas'.'/'.$objFed->Firma),
        ];

        return $result;
    }

    public static function getIdFed($clubCode){
        $id = substr($clubCode, 0, 2);
        return $id.'00';
    }

    public static function getFedImg($idFed)
    {
        $Logo_Fed_Territorial = 'none.fed.png';
        if($idFed=="RL00"){
            $Logo_Fed_Territorial = "1.Rioja.png";
        }

        if($idFed=="8800"){
            $Logo_Fed_Territorial = "10.CastillaLaMancha.png";
        }

        if($idFed=="GC00"){
            $Logo_Fed_Territorial = "11.Gallega.png";
        }

        if($idFed=="7700"){
            $Logo_Fed_Territorial = "12.CastillaLeon.png";
        }

        if($idFed=="4400"){
            $Logo_Fed_Territorial= "13.Navarra.png";
        }

        if($idFed=="BP00"){
            $Logo_Fed_Territorial= "14.Balear.png";
        }

        if($idFed=="1100"){
            $Logo_Fed_Territorial= "15.Cantabria.png";
        }

        if($idFed=="AM00"){
            $Logo_Fed_Territorial= "16.Andaluza.png";
        }

        if($idFed=="MM00"){
            $Logo_Fed_Territorial= "17.Murciana.png";
        }

        if($idFed=="LV00"){
            $Logo_Fed_Territorial= "18.Valenciana.png";
        }

        if($idFed=="CE00"){
            $Logo_Fed_Territorial= "19.Ceuta.png";
        }

        if($idFed=="0200"){
            $Logo_Fed_Territorial= "2.Asturias.png";
        }

        if($idFed=="VB00"){
            $Logo_Fed_Territorial= "3.Vasca.png";
        }

        if($idFed=="CP00"){
            $Logo_Fed_Territorial= "4.Canaria.png";
        }

        if($idFed=="ML00"){
            $Logo_Fed_Territorial= "5.Melilla.png";
        }

        if($idFed=="CB00"){
            $Logo_Fed_Territorial= "6.Catalana.png";
        }

        if($idFed=="9900"){
            $Logo_Fed_Territorial= "7.Estremenya.png";
        }

        if($idFed=="0100"){
            $Logo_Fed_Territorial= "8.Aragon.png";
        }

        if($idFed=="CM00"){
            $Logo_Fed_Territorial= "9.Madrid.png";
        }

        return $Logo_Fed_Territorial;
    }
}