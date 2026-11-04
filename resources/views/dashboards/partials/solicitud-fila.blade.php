@php
  $estadoClase = [
    'pendiente' => 'bg-tertiary-fixed text-on-tertiary-fixed',
    'programada' => 'bg-primary-fixed text-on-primary-fixed',
    'atendida' => 'bg-secondary-container text-on-secondary-container',
    'cancelada' => 'bg-error-container text-on-error-container',
  ];
  $prioridadClase = $s->prioridad >= 11 ? 'bg-error text-on-error' : ($s->prioridad >= 9 ? 'bg-tertiary-container text-on-tertiary-container' : ($s->prioridad >= 7 ? 'bg-primary-fixed text-on-primary-fixed' : 'bg-surface-variant text-on-surface-variant'));
@endphp
<article class="bg-surface-container-lowest rounded-lg p-space-sm border border-outline-variant/30 shadow-xs hover:shadow-sm transition-all flex flex-col gap-2">
  <div class="flex flex-wrap items-start justify-between gap-2">
    <div>
      <p class="font-body-bold text-body-bold text-on-surface">#{{ $s->id }} · {{ $s->tipo_servicio }}</p>
      <p class="font-label-md text-label-md text-on-surface-variant">
        Solicitó: <strong>{{ $s->solicitante->name ?? 'Usuario eliminado' }}</strong> ({{ $s->solicitante->email ?? '—' }}) · Paciente: <strong>{{ $s->paciente }}</strong>
      </p>
      <p class="font-label-sm text-label-sm text-on-surface-variant">Vereda {{ $s->vereda_nombre }} · {{ $s->created_at->diffForHumans() }}</p>
    </div>
    <div class="flex flex-wrap gap-2 font-label-sm text-label-sm">
      <span class="px-2.5 py-0.5 rounded-full font-semibold {{ $prioridadClase }}">Prioridad {{ $s->prioridad_etiqueta }} ({{ $s->prioridad }})</span>
      <span class="px-2.5 py-0.5 rounded-full font-medium {{ $estadoClase[$s->estado] ?? '' }}">{{ ucfirst($s->estado) }}</span>
    </div>
  </div>
  @if ($s->direccion_referencia)
    <p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1">
      <span class="material-symbols-outlined text-[16px] text-primary">signpost</span>
      <span>Cómo llegar: {{ $s->direccion_referencia }}</span>
    </p>
  @endif
  @if ($s->descripcion)
    <p class="font-body-md text-body-md text-on-surface-variant italic bg-surface-container-low/60 p-2 rounded-lg">“{{ $s->descripcion }}”</p>
  @endif
  @if ($s->fecha_programada)
    <p class="font-label-md text-label-md text-primary font-semibold flex items-center gap-1.5">
      <span class="material-symbols-outlined text-[18px]">calendar_today</span>
      Visita programada: {{ $s->fecha_programada->format('d/m/Y') }}@if ($s->promotor) (por {{ $s->promotor->name }})@endif
    </p>
  @endif
  @if (in_array($s->estado, ['pendiente', 'programada'], true))
    <div class="flex flex-wrap items-center gap-2 pt-1 border-t border-outline-variant/15">
      <form method="POST" action="{{ route('solicitudes.estado', $s) }}" class="flex items-center gap-2">
        @csrf @method('PATCH')
        <input type="hidden" name="estado" value="programada">
        <input type="date" name="fecha_programada" min="{{ now()->toDateString() }}" required value="{{ $s->fecha_programada?->toDateString() }}" class="h-10 px-2.5 rounded-lg bg-surface-container-low text-on-surface font-label-md text-label-md border border-outline-variant/40 focus:ring-2 focus:ring-primary/20 focus:outline-none" aria-label="Fecha de visita">
        <button type="submit" class="h-10 px-3.5 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-xs hover:shadow transition active:scale-[0.98] flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[16px]">event</span>
          {{ $s->estado === 'programada' ? 'Reprogramar' : 'Programar fecha' }}
        </button>
      </form>
      <form method="POST" action="{{ route('solicitudes.estado', $s) }}">
        @csrf @method('PATCH')
        <input type="hidden" name="estado" value="atendida">
        <button type="submit" class="h-10 px-3.5 rounded-lg bg-secondary-container hover:bg-secondary text-on-surface hover:text-on-secondary font-label-md text-label-md shadow-xs hover:shadow transition active:scale-[0.98] flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[16px]">check_circle</span>
          Marcar atendida
        </button>
      </form>
    </div>
  @endif
</article>

