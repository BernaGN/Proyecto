<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContracts;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Proyecto extends Model implements AuditableContracts, HasMedia
{
    use HasFactory, SoftDeletes, Auditable, InteractsWithMedia;

    protected $perPage = 10;

    protected $with = ['informacion'];

    protected $fillable = ['cliente_id'];

    public function informacion()
    {
        return $this->morphOne(Informacion::class, 'informable')
            ->withDefault([
                'nombre' => '',
                'descripcion' => '',
            ]);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'habilidades_proyectos');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10);
    }
}
