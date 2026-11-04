<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_standard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"><link href="https://fonts.googleapis.com" rel="preconnect"><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"><link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&amp;family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@layer base { html, body { margin: 0; padding: 0; } body { overscroll-behavior: none; } main > :first-child { margin-top: 0 !important; } main > :last-child { margin-bottom: 0 !important; } } ::-webkit-scrollbar { display: none; }</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "primary-fixed-dim": "#8ed3ca", "tertiary-fixed": "#ffe08e", "surface-dim": "#ccdddd", "on-primary-fixed": "#00201d", "on-tertiary-container": "#4f3d00", "on-primary": "#ffffff", "on-error": "#ffffff", "on-error-container": "#93000a", "on-secondary-fixed": "#131e1a", "secondary-fixed": "#d9e5df", "surface": "#ecfdfc", "on-secondary": "#ffffff", "surface-container": "#e0f1f1", "on-tertiary": "#ffffff", "on-primary-fixed-variant": "#00504a", "outline-variant": "#bec9c6", "on-surface-variant": "#3f4947", "on-background": "#0f1e1e", "surface-container-low": "#e6f7f6", "inverse-on-surface": "#e3f4f3", "tertiary-container": "#cea62c", "surface-container-highest": "#d5e6e5", "background": "#ecfdfc", "surface-bright": "#ecfdfc", "primary-fixed": "#aaf0e6", "on-tertiary-fixed": "#241a00", "on-secondary-container": "#5b6762", "primary": "#00453f", "error-container": "#ffdad6", "inverse-primary": "#8ed3ca", "tertiary-fixed-dim": "#ecc246", "error": "#ba1a1a", "surface-container-high": "#daeceb", "on-surface": "#0f1e1e", "on-tertiary-fixed-variant": "#584400", "tertiary": "#755b00", "inverse-surface": "#243333", "surface-container-lowest": "#ffffff", "secondary-container": "#d9e5df", "secondary": "#56615c", "outline": "#6f7977", "primary-container": "#0f5e57", "on-secondary-fixed-variant": "#3e4945", "secondary-fixed-dim": "#bdc9c3", "surface-variant": "#d5e6e5", "on-primary-container": "#90d5cc", "surface-tint": "#206962" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "space-lg": "2rem", "space-md": "1.25rem", "space-sm": "0.75rem", "gutter": "1.25rem", "space-xl": "3.5rem", "gutter-mobile": "1rem", "margin-mobile": "1rem", "margin": "2rem", "space-xs": "0.375rem" }, "fontFamily": { "headline-sm": ["Merriweather"], "body-lg": ["DM Sans"], "headline-lg-mobile": ["Merriweather"], "body-md": ["DM Sans"], "headline-xl-mobile": ["Merriweather"], "body-bold": ["DM Sans"], "headline-lg": ["Merriweather"], "label-md": ["DM Sans"], "headline-xl": ["Merriweather"], "label-sm": ["DM Sans"], "headline-md": ["Merriweather"], "label-lg": ["DM Sans"] }, "fontSize": { "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "700" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }], "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }], "headline-xl-mobile": ["30px", { "lineHeight": "38px", "fontWeight": "700" }], "body-bold": ["16px", { "lineHeight": "26px", "fontWeight": "700" }], "headline-lg": ["32px", { "lineHeight": "42px", "fontWeight": "700" }], "label-md": ["14px", { "lineHeight": "18px", "fontWeight": "500" }], "headline-xl": ["40px", { "lineHeight": "52px", "fontWeight": "700" }], "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "600" }], "headline-md": ["24px", { "lineHeight": "34px", "fontWeight": "400" }], "label-lg": ["15px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "700" }] } } } };</script></head><body class="bg-background font-body-md text-body-md text-on-surface antialiased min-h-screen flex flex-col"><header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-20 max-w-[1200px] mx-auto px-margin flex items-center justify-between gap-gutter"><div class="flex items-center gap-space-lg"><a href="{{ route('home') }}" class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-primary text-[28px]">nature_people</span><div class="flex flex-col"><span class="font-headline-sm text-headline-sm text-primary tracking-tight">RutaSalud Rural</span><span class="font-label-sm text-label-sm text-on-surface-variant font-normal">Atención y Registro Comunitario</span></div></a><nav class="hidden lg:flex items-center gap-space-xs" data-active-classes="bg-surface-container-high text-primary font-bold rounded-lg"><a aria-current="page" class="px-space-sm py-space-xs transition-colors bg-surface-container-high text-primary font-bold rounded-lg" data-path="inicio" href="#">Inicio</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="mis-visitas" href="#">Mis Citas y Visitas</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="mi-familia" href="#">Mi Familia</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="ayuda" href="#">Ayuda</a></nav></div><div class="flex items-center gap-space-sm"><button aria-label="Notificaciones sanitarias" class="relative p-2 rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" type="button"><span class="material-symbols-outlined text-[22px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-tertiary-container"></span></button><div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-xs py-1 pr-space-sm rounded-full shadow-[0_1px_6px_rgba(27,42,42,0.06)]"><img alt="Foto de Perfil" class="w-8 h-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&amp;fit=crop&amp;q=80&amp;w=150"><div class="flex flex-col text-left"><span class="font-label-sm text-label-sm text-on-surface font-bold">{{ Auth::user()->name }}</span><span class="font-label-sm text-label-sm text-on-surface-variant capitalize">{{ Auth::user()->role ?? 'Paciente / Hogar' }}</span></div></div><form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button type="submit" class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-variant text-on-surface text-xs font-bold transition">Cerrar Sesión</button></form></div></div></header><main class="w-full pt-20 bg-background flex-1 max-w-[1200px] mx-auto px-margin"><div class="flex flex-col w-full"><!-- Banner de Bienvenida Cálido y Estado -->
<div class="w-full mb-space-lg flex flex-col gap-space-sm">
  @if (session('status'))
    <div class="p-3 rounded-lg bg-primary-fixed text-on-primary-fixed font-label-md text-label-md flex items-center gap-2" role="status">
      <span class="material-symbols-outlined text-[20px]">check_circle</span> {{ session('status') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="p-3 rounded-lg bg-error-container text-on-error-container font-label-md text-label-md" role="alert">
      <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
  @endif

  <div class="bg-surface-container rounded-xl shadow-sm p-space-md lg:p-space-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md border border-outline-variant/30">
    <div class="flex flex-col gap-1">
      <span class="font-headline-lg text-headline-lg text-primary">¡Hola, {{ Auth::user()->name }}!</span>
      <p class="font-body-lg text-body-lg text-on-surface">Desde aquí pides visitas médicas y ves en qué estado está cada una.</p>
    </div>
    <button class="h-12 px-space-md rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center gap-2 shadow-md transition-all active:scale-[0.98]" id="open-solicitud-modal" type="button">
      <span class="material-symbols-outlined text-[22px]">add_circle</span>
      Pedir nueva visita médica
    </button>
  </div>
</div>

@php
  $estadoClase = [
    'pendiente' => 'bg-tertiary-fixed text-on-tertiary-fixed',
    'programada' => 'bg-primary-fixed text-on-primary-fixed',
    'atendida' => 'bg-secondary-container text-on-secondary-container',
    'cancelada' => 'bg-error-container text-on-error-container',
  ];
  $estadoTexto = ['pendiente' => 'En espera de programación', 'programada' => 'Visita programada', 'atendida' => 'Atendida', 'cancelada' => 'Cancelada'];
@endphp

<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-space-md mb-space-lg">
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">PRÓXIMA ATENCIÓN EN CASA</span>
    <p class="font-headline-sm text-headline-sm text-on-surface mt-1">
      {{ $proxima?->fecha_programada ? $proxima->fecha_programada->translatedFormat('l d \d\e F') : 'Aún sin fecha' }}
    </p>
    <p class="font-body-md text-body-md text-on-surface-variant mt-1">
      {{ $proxima?->promotor ? 'Programada por '.$proxima->promotor->name : 'El equipo de salud te asignará una fecha.' }}
    </p>
  </div>
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">SOLICITUDES ACTIVAS</span>
    <p class="font-headline-sm text-headline-sm text-on-surface mt-1">{{ $solicitudes->whereIn('estado', ['pendiente', 'programada'])->count() }}</p>
    <p class="font-body-md text-body-md text-on-surface-variant mt-1">Pendientes o ya programadas.</p>
  </div>
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">VISITAS ATENDIDAS</span>
    <p class="font-headline-sm text-headline-sm text-on-surface mt-1">{{ $solicitudes->where('estado', 'atendida')->count() }}</p>
    <p class="font-body-md text-body-md text-on-surface-variant mt-1">Historial de atenciones recibidas.</p>
  </div>
</div>

<div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
  <div class="lg:col-span-8 bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md" id="mis-solicitudes">
    <div class="flex items-center gap-2">
      <span class="material-symbols-outlined text-primary text-[26px]">assignment</span>
      <h2 class="font-headline-sm text-headline-sm text-on-surface">Mis citas y solicitudes</h2>
    </div>

    @forelse ($solicitudes as $s)
      <article class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-2">
        <div class="flex flex-wrap items-start justify-between gap-2">
          <div>
            <h3 class="font-body-bold text-body-bold text-on-surface">{{ $s->tipo_servicio }}</h3>
            <p class="font-label-md text-label-md text-on-surface-variant">
              Para: {{ $s->paciente }} · Vereda {{ $s->vereda_nombre }} · Radicada {{ $s->created_at->diffForHumans() }}
            </p>
          </div>
          <span class="px-3 py-1 rounded-full font-label-sm text-label-sm {{ $estadoClase[$s->estado] ?? '' }}">{{ $estadoTexto[$s->estado] ?? $s->estado }}</span>
        </div>
        @if ($s->direccion_referencia)
          <p class="font-body-md text-body-md text-on-surface-variant">Cómo llegar: {{ $s->direccion_referencia }}</p>
        @endif
        @if ($s->descripcion)
          <p class="font-body-md text-body-md text-on-surface-variant">“{{ $s->descripcion }}”</p>
        @endif
        <div class="flex flex-wrap items-center justify-between gap-2">
          <div class="flex flex-wrap gap-2 font-label-sm text-label-sm">
            <span class="px-2 py-0.5 rounded bg-surface-container text-primary">Urgencia: {{ ucfirst($s->urgencia) }}</span>
            <span class="px-2 py-0.5 rounded bg-surface-container text-primary">Prioridad {{ $s->prioridad_etiqueta }}</span>
            @if ($s->fecha_programada)
              <span class="px-2 py-0.5 rounded bg-primary text-on-primary">Visita: {{ $s->fecha_programada->format('d/m/Y') }}</span>
            @endif
          </div>
          @can('cancel', $s)
            <form method="POST" action="{{ route('solicitudes.cancel', $s) }}" onsubmit="return confirm('¿Cancelar esta solicitud?')">
              @csrf @method('PATCH')
              <button type="submit" class="h-9 px-3 rounded-lg bg-surface-container hover:bg-surface-variant text-error font-label-md text-label-md">Cancelar solicitud</button>
            </form>
          @endcan
        </div>
      </article>
    @empty
      <div class="bg-surface-container-low rounded-xl p-space-lg text-center">
        <span class="material-symbols-outlined text-primary text-[40px]">event_busy</span>
        <p class="font-body-bold text-body-bold text-on-surface mt-2">Todavía no has pedido ninguna visita</p>
        <p class="font-body-md text-body-md text-on-surface-variant">Usa el botón “Pedir nueva visita médica” y aquí verás su estado.</p>
      </div>
    @endforelse
  </div>

  <div class="lg:col-span-4 flex flex-col gap-space-md">
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md flex flex-col gap-2">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[24px]">info</span>
        <h2 class="font-headline-sm text-headline-sm text-on-surface">¿Cómo se define la prioridad?</h2>
      </div>
      <p class="font-body-md text-body-md text-on-surface-variant">
        El equipo de salud ordena las visitas según la urgencia que marcas, la vulnerabilidad de tu vereda y la ruta más corta desde el hospital.
      </p>
    </div>
    <div class="bg-error-container text-on-error-container rounded-xl p-space-md flex flex-col gap-2">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-[24px]">emergency</span>
        <h2 class="font-headline-sm text-headline-sm">¿Tienes una urgencia?</h2>
      </div>
      <p class="font-body-md text-body-md">Si es una emergencia no esperes la visita programada. Llama de inmediato a la línea de emergencias.</p>
      <a class="h-12 rounded-lg bg-error text-on-error font-label-lg text-label-lg flex items-center justify-center gap-2" href="tel:123">
        <span class="material-symbols-outlined text-[20px]">call</span> Llamar al 123
      </a>
    </div>
  </div>
</div>

<div class="fixed inset-0 z-50 bg-on-background/40 backdrop-blur-sm {{ $errors->any() ? 'flex' : 'hidden' }} items-center justify-center p-4" id="solicitud-modal">
  <div class="bg-surface-container-lowest rounded-xl max-w-lg w-full p-space-md lg:p-space-lg shadow-xl flex flex-col gap-space-md max-h-[90vh] overflow-y-auto border border-outline-variant/30">
    <div class="flex items-center justify-between pb-space-xs">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[24px]">assignment_add</span>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Pedir Visita Médica en Mi Hogar</h3>
      </div>
      <button class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container" id="close-solicitud-modal" type="button" aria-label="Cerrar">
        <span class="material-symbols-outlined text-[20px]">close</span>
      </button>
    </div>
    <form class="flex flex-col gap-space-sm" id="visita-form" method="POST" action="{{ route('solicitudes.store') }}">
      @csrf
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-paciente">¿Para quién es la visita médica?</label>
        <input class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-paciente" name="paciente" type="text" required maxlength="120" value="{{ old('paciente', Auth::user()->name) }}" placeholder="Nombre de la persona a atender">
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-vereda">Vereda donde vives</label>
        <select class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-vereda" name="vereda_id" required>
          <option value="" disabled {{ old('vereda_id') ? '' : 'selected' }}>Selecciona tu vereda...</option>
          @foreach ($veredas as $v)
            <option value="{{ $v['id'] }}" {{ (string) old('vereda_id') === (string) $v['id'] ? 'selected' : '' }}>{{ $v['nombre'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-servicio">Motivo de la atención</label>
        <select class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-servicio" name="tipo_servicio" required>
          @foreach ($servicios as $servicio)
            <option value="{{ $servicio }}" {{ old('tipo_servicio') === $servicio ? 'selected' : '' }}>{{ $servicio }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-urgencia">¿Qué tan urgente es?</label>
        <select class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-urgencia" name="urgencia" required>
          <option value="baja" {{ old('urgencia') === 'baja' ? 'selected' : '' }}>Baja — control de rutina</option>
          <option value="media" {{ old('urgencia', 'media') === 'media' ? 'selected' : '' }}>Media — molestia que no mejora</option>
          <option value="alta" {{ old('urgencia') === 'alta' ? 'selected' : '' }}>Alta — síntomas fuertes o persona vulnerable</option>
          <option value="critica" {{ old('urgencia') === 'critica' ? 'selected' : '' }}>Crítica — requiere atención lo antes posible</option>
        </select>
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-direccion">¿Cómo llegar a tu finca?</label>
        <input class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-direccion" name="direccion_referencia" type="text" maxlength="255" value="{{ old('direccion_referencia') }}" placeholder="Ej. 300m arriba de la escuela de la vereda">
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface" for="f-descripcion">Cuéntanos más sobre cómo se siente</label>
        <textarea class="p-3 rounded-lg bg-surface-container-low text-on-surface focus:outline-none focus:ring-2 focus:ring-primary" id="f-descripcion" name="descripcion" maxlength="1000" rows="2" placeholder="Escribe brevemente los síntomas o lo que necesitas">{{ old('descripcion') }}</textarea>
      </div>
      <div class="flex items-center justify-end gap-space-sm pt-space-xs mt-2">
        <button class="h-12 px-space-md rounded-lg bg-surface-container text-on-surface-variant font-label-lg text-label-lg" id="cancel-solicitud-btn" type="button">Cancelar</button>
        <button class="h-12 px-space-md rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg" id="btn-enviar-solicitud" type="submit">Enviar Solicitud</button>
      </div>
    </form>
  </div>
</div>
</div>
<script>
  (function() {
    const modal = document.getElementById('solicitud-modal');
    const open = () => { modal.classList.remove('hidden'); modal.classList.add('flex'); };
    const close = () => { modal.classList.add('hidden'); modal.classList.remove('flex'); };
    document.getElementById('open-solicitud-modal').addEventListener('click', open);
    document.getElementById('close-solicitud-modal').addEventListener('click', close);
    document.getElementById('cancel-solicitud-btn').addEventListener('click', close);
    document.getElementById('visita-form').addEventListener('submit', function () {
      const btn = document.getElementById('btn-enviar-solicitud');
      btn.disabled = true;
      btn.textContent = 'Enviando...';
    });
  })();
</script>
</main><footer class="w-full bg-surface-container-low shadow-[0_1px_8px_rgba(0,0,0,0.03)] mt-space-xl"><div class="max-w-[1200px] mx-auto px-margin py-space-lg flex flex-col md:flex-row items-center justify-between gap-space-md"><div class="flex flex-col gap-1 text-center md:text-left"><span class="font-headline-sm text-headline-sm text-primary">RutaSalud Rural</span><p class="font-body-md text-body-md text-on-surface-variant">Sistema Integral de Atención Primaria para Zonas Dispersas y Veredas</p></div><div class="flex flex-wrap justify-center gap-space-md font-label-md text-label-md text-on-surface-variant"><a class="hover:text-primary transition-colors" data-path="guia-de-campo" href="#">Guía de Campo Offline</a><a class="hover:text-primary transition-colors" data-path="protocolos-msps" href="#">Protocolos MSPS</a><a class="hover:text-primary transition-colors" data-path="soporte-tecnico" href="#">Soporte Técnico</a></div><p class="font-label-sm text-label-sm text-on-surface-variant text-center">© 2024 Red de Salud Rural Comunitaria. Todos los derechos reservados.</p></div></footer>

</body></html>