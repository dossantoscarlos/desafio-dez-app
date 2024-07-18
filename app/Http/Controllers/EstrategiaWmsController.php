<?php

namespace App\Http\Controllers;

use App\Models\EstrategiaWm;
use App\Models\EstrategiaWmHorarioPrioridade;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EstrategiaWmsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dsEstrategia' => ['required', 'string', 'max:255'],
            'nrPrioridade' => ['required', 'integer', 'numeric'],
            'horarios.*.dsHorarioInicio' => ['required', 'string', 'max:5'],
            'horarios.*.dsHorarioFinal' => ['required', 'string', 'max:5'],
            'horarios.*.nrPrioridade' => ['required', 'integer', 'numeric'],
        ]);

        $data = $request->all();

        $data['ds_estrategia_wms'] = $data['dsEstrategia'];
        $data['nr_prioridade'] = $data['nrPrioridade'];

        $data['horarios'] = array_map(function ($horario) {
            return [
                'ds_horario_inicio' => $horario['dsHorarioInicio'],
                'ds_horario_final' => $horario['dsHorarioFinal'],
                'nr_prioridade' => $horario['nrPrioridade'],
            ];
        }, $data['horarios']);

        $request->merge($data);

        unset($request['dsEstrategia']);
        unset($request['nrPrioridade']);

        $model = EstrategiaWm::create($request->only('ds_estrategia_wms', 'nr_prioridade'));
        $cd_estrategia_wms = $model->cd_estrategia_wms;

        $model->horarios()->createMany($request->input('horarios'));

        $model = EstrategiaWm::select('cd_estrategia_wms', 'ds_estrategia_wms', 'nr_prioridade')
        ->with(['horarios' => function (Builder $query) {
            $query->select('cd_estrategia_wms', 'ds_horario_inicio', 'ds_horario_final', 'nr_prioridade');
        }])
        ->findOrFail($cd_estrategia_wms)->toArray();

        unset($model['cd_estrategia_wms']);

        $model['horarios'] = array_map(function ($horario) {
            return [
                'ds_horario_inicio' => $horario['ds_horario_inicio'],
                'ds_horario_final' => $horario['ds_horario_final'],
                'nr_prioridade' => $horario['nr_prioridade']
            ];
        },$model['horarios']);

        return response()->json($model, 201);

    }

    public function prioridade($cd_estrategia_wms, $ds_hora, $ds_minuto) {

        if (!is_numeric($cd_estrategia_wms) || !is_numeric($ds_hora) || !is_numeric($ds_minuto)) {
            return response()->json(['message' => 'Page not found'], 404);
        }

        if ($ds_hora < 0 || $ds_hora > 23 || $ds_minuto < 0 || $ds_minuto > 59) {
            return response()->json(['message' => 'Page not found'], 404);
        }

        $model = EstrategiaWmHorarioPrioridade::where('cd_estrategia_wms', $cd_estrategia_wms)
            ->where('ds_horario_inicio', '=', $ds_hora . ':' . $ds_minuto)
            ->orderByDesc('nr_prioridade')
            ->get('nr_prioridade')->first();

        if(!$model) {
            $model = EstrategiaWm::where('cd_estrategia_wms', $cd_estrategia_wms)->get('nr_prioridade')->first();
        }

        return response()->json($model, 200);
    }

}
