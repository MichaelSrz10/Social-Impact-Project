<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="web_standard" name="shell-type" />

  <!-- Fonts & Material Symbols -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&amp;family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

  <style>
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
      }
      body {
        overscroll-behavior: none;
      }
      main > :first-child {
        margin-top: 0 !important;
      }
      main > :last-child {
        margin-bottom: 0 !important;
      }
    }
    ::-webkit-scrollbar {
      display: none;
    }
  </style>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "primary-fixed-dim": "#8ed3ca",
            "tertiary-fixed": "#ffe08e",
            "surface-dim": "#ccdddd",
            "on-primary-fixed": "#00201d",
            "on-tertiary-container": "#4f3d00",
            "on-primary": "#ffffff",
            "on-error": "#ffffff",
            "on-error-container": "#93000a",
            "on-secondary-fixed": "#131e1a",
            "secondary-fixed": "#d9e5df",
            "surface": "#ecfdfc",
            "on-secondary": "#ffffff",
            "surface-container": "#e0f1f1",
            "on-tertiary": "#ffffff",
            "on-primary-fixed-variant": "#00504a",
            "outline-variant": "#bec9c6",
            "on-surface-variant": "#3f4947",
            "on-background": "#0f1e1e",
            "surface-container-low": "#e6f7f6",
            "inverse-on-surface": "#e3f4f3",
            "tertiary-container": "#cea62c",
            "surface-container-highest": "#d5e6e5",
            "background": "#ecfdfc",
            "surface-bright": "#ecfdfc",
            "primary-fixed": "#aaf0e6",
            "on-tertiary-fixed": "#241a00",
            "on-secondary-container": "#5b6762",
            "primary": "#00453f",
            "error-container": "#ffdad6",
            "inverse-primary": "#8ed3ca",
            "tertiary-fixed-dim": "#ecc246",
            "error": "#ba1a1a",
            "surface-container-high": "#daeceb",
            "on-surface": "#0f1e1e",
            "on-tertiary-fixed-variant": "#584400",
            "tertiary": "#755b00",
            "inverse-surface": "#243333",
            "surface-container-lowest": "#ffffff",
            "secondary-container": "#d9e5df",
            "secondary": "#56615c",
            "outline": "#6f7977",
            "primary-container": "#0f5e57",
            "on-secondary-fixed-variant": "#3e4945",
            "secondary-fixed-dim": "#bdc9c3",
            "surface-variant": "#d5e6e5",
            "on-primary-container": "#90d5cc",
            "surface-tint": "#206962"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "spacing": {
            "space-lg": "2rem",
            "space-md": "1.25rem",
            "space-sm": "0.75rem",
            "gutter": "1.25rem",
            "space-xl": "3.5rem",
            "gutter-mobile": "1rem",
            "margin-mobile": "1rem",
            "margin": "2rem",
            "space-xs": "0.375rem"
          },
          "fontFamily": {
            "headline-sm": ["Merriweather"],
            "body-lg": ["DM Sans"],
            "headline-lg-mobile": ["Merriweather"],
            "body-md": ["DM Sans"],
            "headline-xl-mobile": ["Merriweather"],
            "body-bold": ["DM Sans"],
            "headline-lg": ["Merriweather"],
            "label-md": ["DM Sans"],
            "headline-xl": ["Merriweather"],
            "label-sm": ["DM Sans"],
            "headline-md": ["Merriweather"],
            "label-lg": ["DM Sans"]
          },
          "fontSize": {
            "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "700" }],
            "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
            "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }],
            "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }],
            "headline-xl-mobile": ["30px", { "lineHeight": "38px", "fontWeight": "700" }],
            "body-bold": ["16px", { "lineHeight": "26px", "fontWeight": "700" }],
            "headline-lg": ["32px", { "lineHeight": "42px", "fontWeight": "700" }],
            "label-md": ["14px", { "lineHeight": "18px", "fontWeight": "500" }],
            "headline-xl": ["40px", { "lineHeight": "52px", "fontWeight": "700" }],
            "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "600" }],
            "headline-md": ["24px", { "lineHeight": "34px", "fontWeight": "400" }],
            "label-lg": ["15px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "700" }]
          }
        }
      }
    };
  </script>
</head>

<body class="bg-background font-body-md text-body-md text-on-surface antialiased min-h-screen flex flex-col">
  <!-- Header / Navigation -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
    <div class="h-20 max-w-[1200px] mx-auto px-margin flex items-center justify-between gap-gutter">
      <div class="flex items-center gap-space-lg">
        <a href="{{ route('home') }}" class="flex items-center gap-space-xs">
          <span class="material-symbols-outlined text-primary text-[28px]">nature_people</span>
          <div class="flex flex-col">
            <span class="font-headline-sm text-headline-sm text-primary tracking-tight">RutaSalud Rural</span>
            <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">Atención y Registro Comunitario</span>
          </div>
        </a>
        <nav class="hidden lg:flex items-center gap-space-xs" data-active-classes="bg-surface-container-high text-primary font-bold rounded-lg">
          <a aria-current="page" class="px-space-sm py-space-xs transition-colors bg-surface-container-high text-primary font-bold rounded-lg" data-path="panel-territorial" href="#">Panel Territorial</a>
          <a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="registro-veredal" href="#">Registro Veredal</a>
          <a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="jornadas-de-salud" href="#">Jornadas de Salud</a>
          <a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="censo-familias" href="#">Censo de Familias</a>
          <a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="reportes-epidemiologicos" href="#">Reportes Epidemiológicos</a>
        </nav>
      </div>
      <div class="flex items-center gap-space-sm">
        <div class="hidden sm:flex items-center gap-space-xs bg-surface-container px-space-sm py-1.5 rounded-full shadow-[0_1px_4px_rgba(27,42,42,0.04)]">
          <span class="material-symbols-outlined text-primary text-[18px]">cloud_done</span>
          <span class="font-label-sm text-label-sm text-on-surface">Modo híbrido conectado</span>
        </div>
        <button aria-label="Notificaciones sanitarias" class="relative p-2 rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" type="button">
          <span class="material-symbols-outlined text-[22px]">notifications</span>
          <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-tertiary-container"></span>
        </button>
        <div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-xs py-1 pr-space-sm rounded-full shadow-[0_1px_6px_rgba(27,42,42,0.06)]">
          <img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida/AEtjO1XshXW8uaxW7KeCP6VjPD8k8-ST4XO4AZJ4KsZvg2rHTMk3TaPBlFZYOtyh62wfnJEEWfjWorE08vssS0LKJuFeCgIvGTEH4W2-DU6xgCRxW0pdyYK4_AISx_HoLST_DolB5bR9F5xyW6p4iUySCte9DtOVyEN1Qy4N7v0z92sKXWAEcqN22ISLZe16nJTLUZ22ytP6e9tAfsIbP7eQ_Wvj2FGvUDApg3NldxcU0WU" />
          <div class="flex flex-col text-left">
            <span class="font-label-sm text-label-sm text-on-surface font-bold">{{ Auth::user()->name }}</span>
            <span class="font-label-sm text-label-sm text-on-surface-variant capitalize">{{ Auth::user()->role ?? 'Líder Sanitaria Veredal' }}</span>
          </div>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit" class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-variant text-on-surface text-xs font-bold transition">Cerrar Sesión</button>
        </form>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="w-full pt-20 bg-background flex-1 max-w-[1200px] mx-auto px-margin">
    <div class="flex flex-col w-full gap-space-lg pb-space-xl">
@php
  $estadoClase = [
    'pendiente' => 'bg-tertiary-fixed text-on-tertiary-fixed',
    'programada' => 'bg-primary-fixed text-on-primary-fixed',
    'atendida' => 'bg-secondary-container text-on-secondary-container',
    'cancelada' => 'bg-error-container text-on-error-container',
  ];
  $prioClase = fn ($p) => $p >= 11 ? 'bg-error text-on-error' : ($p >= 9 ? 'bg-tertiary-container text-on-tertiary-container' : ($p >= 7 ? 'bg-primary-fixed text-on-primary-fixed' : 'bg-surface-variant text-on-surface-variant'));
  $filtros = ['activas' => 'Activas', 'pendiente' => 'Pendientes', 'programada' => 'Programadas', 'atendida' => 'Atendidas', 'cancelada' => 'Canceladas', 'todas' => 'Todas'];
@endphp

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

<section class="flex flex-col md:flex-row md:items-end justify-between gap-space-sm">
  <div>
    <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Despacho operativo</span>
    <h1 class="font-headline-lg text-headline-lg text-primary">Panel Territorial</h1>
    <p class="font-body-md text-body-md text-on-surface-variant">
      Salida: {{ $puntoCero['nombre'] }} ({{ $puntoCero['lat'] }}, {{ $puntoCero['lng'] }}) · Datos simulados de referencia.
    </p>
  </div>
  <nav class="flex flex-wrap gap-2" aria-label="Filtrar solicitudes">
    @foreach ($filtros as $clave => $texto)
      <a href="{{ route('dashboard.promotor', ['estado' => $clave]) }}" class="px-3 py-1.5 rounded-full font-label-md text-label-md {{ $filtro === $clave ? 'bg-primary text-on-primary' : 'bg-surface-container text-on-surface-variant hover:bg-surface-variant' }}">{{ $texto }}</a>
    @endforeach
  </nav>
</section>

<section class="grid grid-cols-2 md:grid-cols-4 gap-space-md">
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">PENDIENTES</span>
    <p class="font-headline-lg text-headline-lg text-on-surface">{{ $stats['pendientes'] }}</p>
  </div>
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">PROGRAMADAS</span>
    <p class="font-headline-lg text-headline-lg text-on-surface">{{ $stats['programadas'] }}</p>
  </div>
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20">
    <span class="font-label-sm text-label-sm text-primary font-bold">ATENDIDAS</span>
    <p class="font-headline-lg text-headline-lg text-on-surface">{{ $stats['atendidas'] }}</p>
  </div>
  <div class="bg-error-container text-on-error-container rounded-xl p-space-md shadow-sm">
    <span class="font-label-sm text-label-sm font-bold">PRIORIDAD CRÍTICA</span>
    <p class="font-headline-lg text-headline-lg">{{ $stats['criticas'] }}</p>
  </div>
</section>

<section class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md" id="ruta-sugerida">
  <div class="flex flex-wrap items-center justify-between gap-2">
    <div class="flex items-center gap-2">
      <span class="material-symbols-outlined text-primary text-[26px]">alt_route</span>
      <h2 class="font-headline-sm text-headline-sm text-primary">Ruta sugerida de hoy</h2>
    </div>
    @if ($ruta)
      @php
        $waypoints = collect($paradas)->slice(0, -1)->map(fn ($p) => $p['lat'].','.$p['lng'])->implode('|');
        $ultima = collect($paradas)->last();
        $mapsUrl = 'https://www.google.com/maps/dir/?api=1&origin='.$puntoCero['lat'].','.$puntoCero['lng'].'&destination='.$ultima['lat'].','.$ultima['lng'].($waypoints ? '&waypoints='.urlencode($waypoints) : '').'&travelmode=driving';
      @endphp
      <div class="flex flex-wrap items-center gap-2">
        <span class="px-3 py-1 rounded-full bg-surface-container font-label-md text-label-md text-primary">{{ count($paradas) }} paradas · {{ $ruta['distancia_total_km'] }} km (línea recta, Haversine)</span>
        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" class="h-10 px-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[18px]">map</span> Abrir en Google Maps
        </a>
      </div>
    @endif
  </div>

  @if (! $ruta)
    <div class="bg-surface-container-low rounded-xl p-space-lg text-center">
      <span class="material-symbols-outlined text-primary text-[40px]">inbox</span>
      <p class="font-body-bold text-body-bold text-on-surface mt-2">No hay solicitudes activas</p>
      <p class="font-body-md text-body-md text-on-surface-variant">Cuando un ciudadano pida una visita aparecerá aquí con su ruta.</p>
    </div>
  @else
    <p class="font-body-md text-body-md text-on-surface-variant">
      Se visitan primero las veredas con mayor prioridad (vulnerabilidad de la vereda + urgencia declarada) y se ordenan por vecino más cercano partiendo de {{ $puntoCero['nombre'] }}.
    </p>
    <ol class="flex flex-col gap-space-sm">
      <li class="flex items-center gap-3 bg-surface-container-low rounded-xl p-space-sm">
        <span class="w-9 h-9 rounded-full bg-secondary text-on-secondary flex items-center justify-center material-symbols-outlined text-[20px]">local_hospital</span>
        <div>
          <p class="font-body-bold text-body-bold text-on-surface">Salida · {{ $puntoCero['nombre'] }}</p>
          <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $puntoCero['lat'] }}, {{ $puntoCero['lng'] }}</p>
        </div>
      </li>
      @foreach ($paradas as $p)
        <li class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-space-sm">
          <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-3">
              <span class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold">{{ $p['orden'] }}</span>
              <div>
                <h3 class="font-body-bold text-body-bold text-on-surface">Vereda {{ $p['nombre'] }}</h3>
                <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $p['lat'] }}, {{ $p['lng'] }} · +{{ $p['distancia_desde_anterior_km'] }} km desde la parada anterior</p>
              </div>
            </div>
            <span class="px-3 py-1 rounded-full font-label-sm text-label-sm {{ $prioClase($p['vulnerabilidad']) }}">Prioridad máx. {{ $p['vulnerabilidad'] }}</span>
          </div>
          <div class="flex flex-col gap-2">
            @foreach ($p['solicitudes'] as $s)
              @include('dashboards.partials.solicitud-fila', ['s' => $s])
            @endforeach
          </div>
        </li>
      @endforeach
    </ol>

    @if ($fueraDeRuta->isNotEmpty())
      <div class="bg-surface-container rounded-xl p-space-md">
        <h3 class="font-body-bold text-body-bold text-on-surface">En cola para la siguiente jornada</h3>
        <p class="font-body-md text-body-md text-on-surface-variant">
          La ruta cubre las 5 veredas más prioritarias. Siguen pendientes:
          {{ $fueraDeRuta->map(fn ($v) => $v['nombre'].' (prioridad '.$v['vulnerabilidad'].')')->implode(', ') }}.
        </p>
      </div>
    @endif
  @endif
</section>

<section class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md" id="solicitudes">
  <div class="flex items-center gap-2">
    <span class="material-symbols-outlined text-primary text-[26px]">groups</span>
    <h2 class="font-headline-sm text-headline-sm text-primary">Solicitudes recibidas ({{ $filtros[$filtro] ?? 'Activas' }})</h2>
  </div>
  @forelse ($solicitudes as $s)
    @include('dashboards.partials.solicitud-fila', ['s' => $s])
  @empty
    <p class="font-body-md text-body-md text-on-surface-variant">No hay solicitudes con este filtro.</p>
  @endforelse
</section>
</div>
  </main>

  <!-- Footer -->
  <footer class="w-full bg-surface-container-low shadow-[0_1px_8px_rgba(0,0,0,0.03)] mt-space-xl">
    <div class="max-w-[1200px] mx-auto px-margin py-space-lg flex flex-col md:flex-row items-center justify-between gap-space-md">
      <div class="flex flex-col gap-1 text-center md:text-left">
        <span class="font-headline-sm text-headline-sm text-primary">RutaSalud Rural</span>
        <p class="font-body-md text-body-md text-on-surface-variant">Sistema Integral de Atención Primaria para Zonas Dispersas y Veredas</p>
      </div>
      <div class="flex flex-wrap justify-center gap-space-md font-label-md text-label-md text-on-surface-variant">
        <a class="hover:text-primary transition-colors" data-path="guia-de-campo" href="#">Guía de Campo Offline</a>
        <a class="hover:text-primary transition-colors" data-path="protocolos-msps" href="#">Protocolos MSPS</a>
        <a class="hover:text-primary transition-colors" data-path="soporte-tecnico" href="#">Soporte Técnico</a>
      </div>
      <p class="font-label-sm text-label-sm text-on-surface-variant text-center">© 2024 Red de Salud Rural Comunitaria. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

</html>