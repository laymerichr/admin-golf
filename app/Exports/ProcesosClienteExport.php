<?php

namespace App\Exports;

use App\Models\Admin\Client;
use App\Models\Admin\ParticipantRater;
use App\Models\Admin\RaterRole;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

class ProcesosClienteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $client = Client::with(['pinstances'])->find(1);

        $pInstances = $client->pinstances;

        $data = collect();
        $autoEvaluadoId = RaterRole::where('slug', 'autoevaluado')->first()->id;
        foreach ($pInstances as $item)
        {
            // Buscando cantidad de autoevaluados
            $cant_autoevaluados = count(ParticipantRater::where('client_id', 1)
                ->where('pinstance_id', $item->id)
                ->where('rater_role_id', $autoEvaluadoId)
                ->get());

            $data->push([
                'name' => $item->name,
                'autoevaluados' => $cant_autoevaluados ? $cant_autoevaluados : 0,
                'start_date' => Carbon::parse($item->date_start)->format('d/m/Y'),
                'end_date' => Carbon::parse($item->date_end)->format('d/m/Y'),
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nombre Proyecto',
            'Autoevaluados',
            'Fecha de Alta',
            'Fecha Cierre'
        ];
    }
}
