<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContracts;

class Servicio extends Model implements AuditableContracts
{
    use HasFactory, SoftDeletes, Auditable;

    protected $perPage = 10;

    protected $with = ['informacion'];

    public function informacion()
    {
        return $this->morphOne(Informacion::class, 'informable')
            ->withDefault([
                'nombre' => '',
                'descripcion' => '',
            ]);
    }
}
