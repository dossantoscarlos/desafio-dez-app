<?php

namespace App\Http\Controllers;

use App\Models\EstrategiaWm;
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
            'horarios' => ['required', 'array'],
        ]);

        dd($request->all());

    }


}


/*
{
 "dsEstrategia": "RETIRA",
 "nrPrioridade": 10,
 "horarios": [
        {
            "dsHorarioInicio": "09:00",
            "dsHorarioFinal": "10:00",
            "nrPrioridade": 40
        },
        {
            "dsHorarioInicio": "10:01",
            "dsHorarioFinal": "11:00",
            "nrPrioridade": 30
        },
        {
            "dsHorarioInicio": "11:01",
            "dsHorarioFinal": "12:00",
            "nrPrioridade": 20
        },
    ]
}

*/
