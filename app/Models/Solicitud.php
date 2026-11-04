<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'promotor_id', 'vereda_id', 'vereda_nombre', 'lat', 'lng', 'paciente',
    'tipo_servicio', 'direccion_referencia', 'descripcion', 'urgencia', 'prioridad',
    'estado', 'fecha_programada',
])]
class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    public const URGENCIAS = ['baja' => 0, 'media' => 1, 'alta' => 2, 'critica' => 3];

    public const ESTADOS = ['pendiente', 'programada', 'atendida', 'cancelada'];

    protected function casts(): array
    {
        return [
            'lat' => 'float',
            'lng' => 'float',
            'vereda_id' => 'integer',
            'prioridad' => 'integer',
            'fecha_programada' => 'date',
        ];
    }

    /**
     * Prioridad = vulnerabilidad de la vereda (1-10) + peso de la urgencia declarada (0-3).
     */
    public static function calcularPrioridad(int $vulnerabilidad, string $urgencia): int
    {
        return $vulnerabilidad + (self::URGENCIAS[$urgencia] ?? 1);
    }

    public function getPrioridadEtiquetaAttribute(): string
    {
        return match (true) {
            $this->prioridad >= 11 => 'Crítica',
            $this->prioridad >= 9 => 'Alta',
            $this->prioridad >= 7 => 'Media',
            default => 'Baja',
        };
    }

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promotor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'promotor_id');
    }
}
