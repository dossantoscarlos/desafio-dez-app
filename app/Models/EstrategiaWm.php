<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstrategiaWm extends Model
{
    use HasFactory;


    public function horarios () : HasMany
    {
        return $this->hasMany(EstrategiaWmHorarioPrioridade::class);
    }
}
