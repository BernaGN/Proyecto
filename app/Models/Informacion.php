<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContracts;

class Informacion extends Model implements AuditableContracts
{
    use HasFactory, Auditable;

    protected $table = 'informaciones';

    public $timestamps = false;

    protected $fillable = ['nombre', 'slug', 'descripcion'];

    public function informable()
    {
        return $this->morphTo()->withTimestamps();
    }
}
