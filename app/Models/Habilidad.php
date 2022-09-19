<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContracts;

class Habilidad extends Model implements AuditableContracts
{
    use HasFactory, SoftDeletes, Auditable;

    protected $table = 'habilidades';

    protected $perPage = 10;

    protected $fillable = ['nombre'];

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'habilidades_proyectos');
    }
}
