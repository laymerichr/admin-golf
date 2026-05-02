<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\ImgFirmas;

class FillImgFirmas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_fed'=>'BP00',
                'url'=>'assets/img/firmas/baleares.jpg'
            ],
            [
                'id_fed'=>'AM00',
                'url'=>'assets/img/firmas/andalucia.jpg'
            ],
            [
                'id_fed'=>'9900',
                'url'=>'assets/img/firmas/extremaydura.jpg'
            ],
            [
                'id_fed'=>'8800',
                'url'=>'assets/img/firmas/castilla-la-mancha.jpg'
            ],
            [
                'id_fed'=>'7700',
                'url'=>'assets/img/firmas/castilla-leon.jpg'
            ],
            [
                'id_fed'=>'4400',
                'url'=>'assets/img/firmas/navarra.jpg'
            ],
            [
                'id_fed'=>'1100',
                'url'=>'assets/img/firmas/cantabria.jpg'
            ],
            [
                'id_fed'=>'0200',
                'url'=>'assets/img/firmas/asturias.jpg'
            ],
            [
                'id_fed'=>'0100',
                'url'=>'assets/img/firmas/aragon.jpg'
            ],
            [
                'id_fed'=>'CM00',
                'url'=>'assets/img/firmas/madrid.jpg'
            ],
            [
                'id_fed'=>'-F00',
                'url'=>'assets/img/firmas/aragon.jpg'
            ],
            [
                'id_fed'=>'CB00',
                'url'=>'assets/img/firmas/catalunya.jpg'
            ],
            [
                'id_fed'=>'CE00',
                'url'=>'assets/img/firmas/ceuta.jpg'
            ],
            [
                'id_fed'=>'CP00',
                'url'=>'assets/img/firmas/canarias.jpg'
            ],
            [
                'id_fed'=>'GC00',
                'url'=>'assets/img/firmas/galicia.jpg'
            ],
            [
                'id_fed'=>'LV00',
                'url'=>'assets/img/firmas/valencia.jpg'
            ],
            [
                'id_fed'=>'ML00',
                'url'=>'assets/img/firmas/melilla.jpg'
            ],
            [
                'id_fed'=>'MM00',
                'url'=>'assets/img/firmas/murcia.jpg'
            ],
            [
                'id_fed'=>'RL00',
                'url'=>'assets/img/firmas/rioja.jpg'
            ],
            [
                'id_fed'=>'VB00',
                'url'=>'assets/img/firmas/vasca.jpg'
            ],
            [
                'id_fed'=>'VV00',
                'url'=>'assets/img/firmas/vasca.jpg'
            ],
            [
                'id_fed'=>'H000',
                'url'=>'assets/img/firmas/rfeg.png'
            ],

        ];

        foreach ($data as $dat)
        {
           ImgFirmas::create($dat);
        }
    }
}
