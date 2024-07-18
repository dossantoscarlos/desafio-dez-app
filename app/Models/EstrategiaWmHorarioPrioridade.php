<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstrategiaWmHorarioPrioridade extends Model
{
    use HasFactory;

    protected $primaryKey="cd_estrategia_wms_horario_prioridade";

    protected $table = 'estrategia_wms_horario_prioridades';

    public $timestamps = false;

    protected $fillable = [
        'nr_prioridade',
        'ds_horario_inicio',
        'ds_horario_final',
        'cd_estrategia_wms',
        'dt_modificado',
        'dt_registro'
    ];

    public function estrategiaWm() : BelongsTo
    {
        return $this->belongsTo(EstrategiaWm::class , 'cd_estrategia_wms' , 'cd_estrategia_wms');
    }
}
