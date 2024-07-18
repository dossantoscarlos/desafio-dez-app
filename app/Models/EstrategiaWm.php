<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstrategiaWm extends Model
{
    use HasFactory;

    protected $primaryKey = 'cd_estrategia_wms';

    protected $table = "estrategia_wms";

    public $timestamps = false;


    protected $fillable = [
        'ds_estrategia_wms',
        'nr_prioridade',
        'dt_registro',
        'dt_modificado',
    ];

    public function horarios () : HasMany
    {
        return $this->hasMany(EstrategiaWmHorarioPrioridade::class,'cd_estrategia_wms', 'cd_estrategia_wms');
    }
}
