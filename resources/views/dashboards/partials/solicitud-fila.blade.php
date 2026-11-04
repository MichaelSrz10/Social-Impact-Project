@php
  $estadoClase = [
    'pendiente' => 'bg-tertiary-fixed text-on-tertiary-fixed',
    'programada' => 'bg-primary-fixed text-on-primary-fixed',
    'atendida' => 'bg-secondary-container text-on-secondary-container',
    'cancelada' => 'bg-error-container text-on-error-container',
  ];
  $prioridadClase = $s->prioridad >= 11 ? 'bg-error text-on-error' : ($s->prioridad >= 9 ? 'bg-tertiary-container text-on-tertiary-container' : ($s->prioridad >= 7 ? 'bg-primary-fixed text-on-primary-fixed' : 'bg-surface-variant text-on-surface-variant'));
@endphp
<article class="bg-surface-container-lowest rounded-lg p-space-sm border border-outline-variant/30 flex flex-col gap-2">
  <div class="flex flex-wrap items-start justify-between gap-2">
    <div>
      <p class="font-body-bold text-body-bold text-on-surface">#{{ $s->id }} · {{ $s->tipo_servicio }}</p>
      <p class="font-label-md text-label-md text-on-surface-variant">
        Solicitó: <strong>{{ $s->solicitante->name ?? 'Usuario eliminado' }}</strong> ({{ $s->solicitante->email ?? '—' }}) · Paciente: {{ $s->paciente }}
      </p>
      <p class="font-label-sm text-label-sm text-on-surface-variant">Vereda {{ $s->vereda_nombre }} · {{ $s->created_at->diffForHumans() }}</p>
    </div>
    <div class="flex flex-wrap gap-2 font-label-sm text-label-sm">
      <span class="px-2 py-0.5 rounded-full {{ $prioridadClase }}">Prioridad {{ $s->prioridad_etiqueta }} ({{ $s->prioridad }})</span>
      <span class="px-2 py-0.5 rounded-full {{ $estadoClase[$s->estado] ?? '' }}">{{ ucfirst($s->estado) }}</span>
    </div>
  </div>
  @if ($s->direccion_referencia)
    <p class="font-body-md text-body-md text-on-surface-variant">Cómo llegar: {{ $s->direccion_referencia }}</p>
  @endif
  @if ($s->descripcion)
    <p class="font-body-md text-body-md text-on-surface-variant">“{{ $s->descripcion }}”</p>
  @endif
  @if ($s->fecha_programada)
    <p class="font-label-md text-label-md text-primary">Visita programada: {{ $s->fecha_programada->format('d/m/Y') }}@if ($s->promotor) por {{ $s->promotor->name }}@endif</p>
  @endif
  @if (in_array($s->estado, ['pendiente', 'programada'], true))
    <div class="flex flex-wrap items-center gap-2">
      <form method="POST" action="{{ route('solicitudes.estado', $s) }}" class="flex items-center gap-2">
        @csrf @method('PATCH')
        <input type="hidden" name="estado" value="programada">
        <input type="date" name="fecha_programada" min="{{ now()->toDateString() }}" required value="{{ $s->fecha_programada?->toDateString() }}" class="h-10 px-2 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md" aria-label="Fecha de visita">
        <button type="submit" class="h-10 px-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md">{{ $s->estado === 'programada' ? 'Reprogramar' : 'Programar' }}</button>
      </form>
      <form method="POST" action="{{ route('solicitudes.estado', $s) }}">
        @csrf @method('PATCH')
        <input type="hidden" name="estado" value="atendida">
        <button type="submit" class="h-10 px-3 rounded-lg bg-secondary-container text-on-surface font-label-md text-label-md">Marcar atendida</button>
      </form>
    </div>
  @endif
</article>

