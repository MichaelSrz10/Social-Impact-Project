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
      
      <!-- Offline/Terrain Synchronization Status Notice -->
      <div class="w-full bg-secondary-container rounded-xl p-space-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm shadow-sm">
        <div class="flex items-center gap-space-xs text-on-secondary-fixed">
          <span class="material-symbols-outlined text-primary text-[22px]" style="font-variation-settings: 'FILL' 1;">cloud_sync</span>
          <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-space-sm">
            <span class="font-body-bold text-body-bold">Sincronizado (Modo offline listo para terreno)</span>
            <span class="font-label-sm text-label-sm text-on-secondary-container">Última descarga satelital: hoy 05:40 AM · Memoria local: 98% libre</span>
          </div>
        </div>
        <div class="flex items-center gap-space-xs">
          <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
          <span class="font-label-sm text-label-sm text-on-secondary-fixed font-semibold">Listo para desconexión en trocha</span>
        </div>
      </div>

      <!-- Operational Header & Dispatch Meta -->
      <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md bg-surface-container-lowest p-space-lg rounded-xl shadow-sm">
        <div class="flex flex-col gap-1 max-w-2xl">
          <div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
            <span class="material-symbols-outlined text-[16px] text-primary">local_hospital</span>
            <span>ESE Hospital San Antonio · Choachí, Cundinamarca</span>
            <span>·</span>
            <span class="font-semibold text-primary">Subred Oriente Rural</span>
          </div>
          <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">
            Tablero Operativo de Brigadas y Despacho
          </h1>
          <p class="font-body-md text-body-md text-on-surface-variant">
            Planificación, georreferenciación de visitas domiciliarias y supervisión de cadena de frío para personal extramural en veredas de alta pendiente.
          </p>
        </div>
        <!-- Top Action CTAs -->
        <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
          <button class="h-12 px-space-md rounded-lg bg-surface-container text-primary font-label-lg text-label-lg hover:bg-surface-container-high transition-colors flex items-center gap-2" type="button">
            <span class="material-symbols-outlined text-[20px]">download</span>
            Exportar Fichas para Terreno
          </button>
          <button class="h-12 px-space-md rounded-lg bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container transition-colors shadow-sm flex items-center gap-2" type="button">
            <span class="material-symbols-outlined text-[20px]">add_road</span>
            + Asignar Nueva Ruta
          </button>
        </div>
      </div>

      <!-- Quick Filter Strip -->
      <div class="bg-surface-container-low p-space-sm rounded-xl flex flex-wrap items-center justify-between gap-space-sm">
        <div class="flex flex-wrap items-center gap-space-sm">
          <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
            <span class="material-symbols-outlined text-[18px]">filter_alt</span>
            <span>Vereda:</span>
          </div>
          <div class="flex flex-wrap gap-1.5">
            <button class="px-3 py-1.5 rounded-full font-label-sm text-label-sm bg-primary text-on-primary font-bold" type="button">Todas (4)</button>
            <button class="px-3 py-1.5 rounded-full font-label-sm text-label-sm bg-surface-container text-on-surface hover:bg-surface-container-high" type="button">El Salitre</button>
            <button class="px-3 py-1.5 rounded-full font-label-sm text-label-sm bg-surface-container text-on-surface hover:bg-surface-container-high" type="button">Aguadas</button>
            <button class="px-3 py-1.5 rounded-full font-label-sm text-label-sm bg-surface-container text-on-surface hover:bg-surface-container-high" type="button">San Lorenzo</button>
            <button class="px-3 py-1.5 rounded-full font-label-sm text-label-sm bg-surface-container text-on-surface hover:bg-surface-container-high" type="button">Fómeque Trocha</button>
          </div>
        </div>
        <div class="flex items-center gap-space-xs">
          <span class="text-on-surface-variant font-label-sm text-label-sm">Estado:</span>
          <div class="flex gap-1">
            <span class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-on-surface text-label-sm font-label-sm font-semibold">Pendientes (8)</span>
            <span class="px-2.5 py-1 rounded-md bg-secondary-container text-on-secondary-container text-label-sm font-label-sm">En ruta (3)</span>
            <span class="px-2.5 py-1 rounded-md bg-surface-container-lowest text-on-surface text-label-sm font-label-sm">Atendidos (3)</span>
          </div>
        </div>
      </div>

      <!-- Summary Metric Bento Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
        <!-- Stat 1 -->
        <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
          <div class="flex items-center justify-between text-on-surface-variant">
            <span class="font-label-sm text-label-sm uppercase tracking-wide">Solicitudes Pendientes</span>
            <span class="material-symbols-outlined text-[20px] text-primary">pending_actions</span>
          </div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="font-headline-xl text-headline-xl text-primary font-bold">14</span>
            <span class="font-body-md text-body-md text-on-surface-variant">visitas en trocha</span>
          </div>
          <div class="mt-3 flex items-center gap-1.5 text-label-sm font-label-sm text-on-secondary-container">
            <span class="material-symbols-outlined text-[16px] text-primary">terrain</span>
            <span>8 veredas dispersas programadas</span>
          </div>
        </div>
        <!-- Stat 2 -->
        <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
          <div class="flex items-center justify-between text-on-surface-variant">
            <span class="font-label-sm text-label-sm uppercase tracking-wide">Pacientes Priorizados</span>
            <span class="material-symbols-outlined text-[20px] text-tertiary">priority_high</span>
          </div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="font-headline-xl text-headline-xl text-primary font-bold">6</span>
            <span class="font-body-md text-body-md text-tertiary font-semibold">alta vigilancia</span>
          </div>
          <div class="mt-3 font-label-sm text-label-sm text-on-surface-variant truncate">
            3 gestantes · 2 crónicos · 1 menor sin vacunas
          </div>
        </div>
        <!-- Stat 3 -->
        <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
          <div class="flex items-center justify-between text-on-surface-variant">
            <span class="font-label-sm text-label-sm uppercase tracking-wide">Brigadas en Campo Hoy</span>
            <span class="material-symbols-outlined text-[20px] text-primary">group_work</span>
          </div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="font-headline-xl text-headline-xl text-primary font-bold">2</span>
            <span class="font-body-md text-body-md text-on-surface-variant">equipos activos</span>
          </div>
          <div class="mt-3 font-label-sm text-label-sm text-on-surface-variant flex items-center gap-2">
            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-primary"></span> Campero 4x4 N° 2</span>
            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-tertiary-container"></span> Cuadrilla a pie</span>
          </div>
        </div>
        <!-- Stat 4 -->
        <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col justify-between">
          <div class="flex items-center justify-between text-on-surface-variant">
            <span class="font-label-sm text-label-sm uppercase tracking-wide">Biológicos en Cadena Fría</span>
            <span class="material-symbols-outlined text-[20px] text-primary">ac_unit</span>
          </div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="font-headline-xl text-headline-xl text-primary font-bold">48</span>
            <span class="font-body-md text-body-md text-on-surface-variant">termos alistados</span>
          </div>
          <div class="mt-3 flex items-center justify-between font-label-sm text-label-sm text-on-secondary-container">
            <span>Rango: <strong>+3.8 °C</strong> (Óptimo)</span>
            <span class="text-primary font-bold">PAI + Rabia</span>
          </div>
        </div>
      </div>

      <!-- Field Atmosphere Banner -->
      <div class="w-full bg-surface-container-low rounded-xl overflow-hidden shadow-sm flex flex-col md:flex-row items-center justify-between">
        <div class="p-space-lg max-w-xl flex flex-col gap-2">
          <span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Atención Integral en Casa de Familia</span>
          <h2 class="font-headline-md text-headline-md text-primary">
            Cuidado temprano en la montaña: cada vereda cuenta
          </h2>
          <p class="font-body-md text-body-md text-on-surface-variant">
            Evaluación pediátrica, tamizaje de tensión arterial y seguimiento a madres gestantes directamente en sus fincas, respetando los tiempos y saberes de la comunidad campesina.
          </p>
          <div class="flex items-center gap-space-md pt-2 text-label-sm font-label-sm text-on-surface font-semibold">
            <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-primary text-[18px]">medical_services</span> Maletín de diagnóstico completo</span>
            <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-primary text-[18px]">escalator_warning</span> Valoración integral madre e hijo</span>
          </div>
        </div>
        <div class="w-full md:w-80 h-56 md:h-full min-h-[220px] relative overflow-hidden">
          <img class="w-full h-full object-cover" data-alt="A documentary style close photograph of a Colombian rural community health worker..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA9w2waIdzZZaNS0r5szWlTac3vWwVSB9lX8LH_4N-kPfi-LbitWCWwqOVIWM2GTb2PhCYEdAiPmyzFwWMPWuDH8NufQNd4PA-CwnET_SAjHtS_ZGFCSS9QvdH2K5fgm8fkrzadLamARmOlClbijA9hz_L5FBmhM7GSQzU97o89bVlkMR4VhEorAWuRk7r4n3B1wvKv9wlG0joArwpjIP81nUzeu0Ds8FqgcyfO0Q" />
        </div>
      </div>

      <!-- Main Widescreen Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        
        <!-- LEFT COLUMN (8 cols): Hoja de Ruta -->
        <section class="lg:col-span-8 flex flex-col gap-space-md">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary text-[24px]">route</span>
              <h2 class="font-headline-sm text-headline-sm text-primary">
                Hoja de Ruta y Paradas Programadas del Día
              </h2>
            </div>
            <span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Orden secuencial optimizado por altimetría</span>
          </div>

          <!-- Stop Cards Stream -->
          <div class="flex flex-col gap-space-md">
            <!-- PARADA 1 -->
            <article class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm transition-all hover:shadow-md">
              <div class="flex flex-col gap-space-sm">
                <div class="flex flex-wrap items-start justify-between gap-space-xs">
                  <div class="flex items-center gap-space-xs">
                    <span class="w-8 h-8 rounded-full bg-primary text-on-primary font-label-lg text-label-lg flex items-center justify-center font-bold">1</span>
                    <div>
                      <div class="flex items-center gap-2">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Vereda El Salitre · Finca La Esperanza</h3>
                        <span class="px-2.5 py-0.5 rounded-full font-label-sm text-label-sm bg-primary text-on-primary font-bold">Prioridad Alta</span>
                      </div>
                      <span class="font-body-md text-body-md text-on-surface-variant font-medium">Familia Martínez Gómez</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span>En camino (ETA 10:15 AM)</span>
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-xs bg-surface-container-low p-space-sm rounded-lg text-on-surface">
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Motivo de Intervención</span>
                    <span class="font-body-bold text-body-bold text-primary">Gestante semana 32 + control menor</span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Medio de Transporte</span>
                    <span class="font-body-md text-body-md font-semibold flex items-center gap-1">
                      <span class="material-symbols-outlined text-[18px]">directions_car</span> Campero 4x4 N° 2
                    </span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Coordenadas / Hito</span>
                    <span class="font-body-md text-body-md text-on-surface-variant">4°34'12"N, 73°58'21"W (Tranquera Roja)</span>
                  </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-space-sm pt-2">
                  <div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-tertiary text-[18px]">warning</span>
                    <span>Revisión ecografía previa + suplementación hierro</span>
                  </div>
                  <div class="flex flex-wrap items-center gap-space-xs">
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">clinical_notes</span>
                      Ver Ficha Clínica
                    </button>
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">explore</span>
                      Mapa Trocha
                    </button>
                    <button class="h-10 px-space-sm rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">check_circle</span>
                      Marcar Atendido
                    </button>
                  </div>
                </div>
              </div>
            </article>

            <!-- PARADA 2 -->
            <article class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm transition-all hover:shadow-md">
              <div class="flex flex-col gap-space-sm">
                <div class="flex flex-wrap items-start justify-between gap-space-xs">
                  <div class="flex items-center gap-space-xs">
                    <span class="w-8 h-8 rounded-full bg-secondary text-on-secondary font-label-lg text-label-lg flex items-center justify-center font-bold">2</span>
                    <div>
                      <div class="flex items-center gap-2">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Vereda Aguadas · Casa Comunal</h3>
                        <span class="px-2.5 py-0.5 rounded-full font-label-sm text-label-sm bg-secondary-container text-on-secondary-container font-semibold">Prioridad Media</span>
                      </div>
                      <span class="font-body-md text-body-md text-on-surface-variant font-medium">Don Ramón Morales (74 años)</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px]">schedule</span>
                    <span>Pendiente (11:45 AM aprox)</span>
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-xs bg-surface-container-low p-space-sm rounded-lg text-on-surface">
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Motivo de Intervención</span>
                    <span class="font-body-bold text-body-bold text-primary">Tensión arterial + entrega Losartán</span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Acceso y Transporte</span>
                    <span class="font-body-md text-body-md font-semibold flex items-center gap-1">
                      <span class="material-symbols-outlined text-[18px]">hiking</span> Camino a pie 25 min desde trocha
                    </span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Observación Terreno</span>
                    <span class="font-body-md text-body-md text-on-surface-variant">Camino empedrado húmedo, bastón de apoyo</span>
                  </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-space-sm pt-2">
                  <div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-primary text-[18px]">medication</span>
                    <span>Lote medicamentos verificado en maleta N° 1</span>
                  </div>
                  <div class="flex flex-wrap items-center gap-space-xs">
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">clinical_notes</span>
                      Ver Ficha
                    </button>
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">edit_calendar</span>
                      Reprogramar
                    </button>
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">near_me</span>
                      Ruta a Pie
                    </button>
                  </div>
                </div>
              </div>
            </article>

            <!-- PARADA 3 -->
            <article class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm transition-all hover:shadow-md">
              <div class="flex flex-col gap-space-sm">
                <div class="flex flex-wrap items-start justify-between gap-space-xs">
                  <div class="flex items-center gap-space-xs">
                    <span class="w-8 h-8 rounded-full bg-secondary-fixed-dim text-on-secondary-fixed font-label-lg text-label-lg flex items-center justify-center font-bold">3</span>
                    <div>
                      <div class="flex items-center gap-2">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Vereda San Lorenzo · Escuela Rural</h3>
                        <span class="px-2.5 py-0.5 rounded-full font-label-sm text-label-sm bg-primary text-on-primary font-bold">Prioridad Alta</span>
                      </div>
                      <span class="font-body-md text-body-md text-on-surface-variant font-medium">Jornada Escolar PAI · 5 Niños convocados</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px]">event</span>
                    <span>Programada 2:00 PM</span>
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-xs bg-surface-container-low p-space-sm rounded-lg text-on-surface">
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Intervención Colectiva</span>
                    <span class="font-body-bold text-body-bold text-primary">Esquema regular + Talla y Peso</span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Responsable en Punto</span>
                    <span class="font-body-md text-body-md font-semibold">Profesora Nubia Riaño (Enlace)</span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-on-surface-variant">Conectividad estimada</span>
                    <span class="font-body-md text-body-md text-on-surface-variant">Sin señal celular · Registro local activo</span>
                  </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-space-sm pt-2">
                  <div class="flex items-center gap-2 text-label-sm font-label-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-primary text-[18px]">vaccines</span>
                    <span>Termo Portátil N° 3 asignado exclusivamente</span>
                  </div>
                  <div class="flex flex-wrap items-center gap-space-xs">
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">checklist</span>
                      Listado Escolar PAI
                    </button>
                    <button class="h-10 px-space-sm rounded-lg bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
                      <span class="material-symbols-outlined text-[18px]">map</span>
                      Ver Ubicación
                    </button>
                  </div>
                </div>
              </div>
            </article>
          </div>

          <!-- Altimetry Profile Graphic -->
          <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm mt-space-xs">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[20px]">elevation</span>
                <span class="font-headline-sm text-headline-sm text-primary">Perfil Altimétrico de la Ruta de Hoy</span>
              </div>
              <span class="font-label-sm text-label-sm text-on-surface-variant">Desnivel acumulado: +840m / -620m</span>
            </div>
            <div class="w-full h-24 bg-surface-container-low rounded-lg p-2 flex flex-col justify-end">
              <svg class="w-full h-full text-primary" fill="none" preserveaspectratio="none" viewbox="0 0 700 80">
                <path d="M 0,65 L 120,40 L 250,55 L 420,15 L 560,35 L 700,50 L 700,80 L 0,80 Z" fill="currentColor" fill-opacity="0.12"></path>
                <path d="M 0,65 L 120,40 L 250,55 L 420,15 L 560,35 L 700,50" stroke="currentColor" stroke-linecap="round" stroke-width="2.5"></path>
                <circle class="animate-pulse" cx="120" cy="40" fill="#00453f" r="4.5"></circle>
                <circle cx="250" cy="55" fill="#56615c" r="4.5"></circle>
                <circle cx="420" cy="15" fill="#755b00" r="4.5"></circle>
                <circle cx="700" cy="50" fill="#00453f" r="4.5"></circle>
              </svg>
              <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant px-1 pt-1">
                <span>Choachí Centro (1,927 msnm)</span>
                <span>El Salitre (2,180 msnm)</span>
                <span>Aguadas (2,050 msnm)</span>
                <span>San Lorenzo Alto (2,450 msnm)</span>
              </div>
            </div>
          </div>
        </section>

        <!-- RIGHT COLUMN (4 cols): Map, Cold Chain & Alerts -->
        <aside class="lg:col-span-4 flex flex-col gap-space-md">
          <!-- Visor de Cobertura -->
          <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[22px]">explore</span>
                <h3 class="font-headline-sm text-headline-sm text-primary">Mini Visor de Cobertura</h3>
              </div>
              <span class="font-label-sm text-label-sm text-primary font-bold">GPS Activo</span>
            </div>
            <div class="w-full h-56 rounded-lg relative overflow-hidden bg-surface-container flex items-center justify-center shadow-inner" data-location="Choachi, Cundinamarca, Colombia" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAR0WlDOPxoQBRY0oHECci2UFCvGR0q3Sr2G87MlFKSgHtl05jAbuHKwt2hsEF33B9Rk7-eu1iANU0kk8NogZG8Vj05UdAe3PTBQW6gbPeqNGdiv3rcVrAgFxHPHSfUfV7mLuB34BQ_dUKiZtbNi3Z7P4xTffV25ygv7SbEEFn9YpX0dv1Z5KY061n6We3FDmP_9j4Uoc0PhADXz9uCqhhOHPYy-tJJDLFuEdXi1ag')">
              <div class="absolute inset-0 bg-primary/25 mix-blend-multiply pointer-events-none"></div>
              <div class="absolute bottom-2 left-2 right-2 bg-surface-container-lowest/95 backdrop-blur-md p-2 rounded-lg flex items-center justify-between text-on-surface shadow-sm">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[18px]">near_me</span>
                  <span class="font-label-sm text-label-sm font-bold">Campero 4x4 N° 2 en movimiento</span>
                </div>
                <span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Vel: 22 km/h</span>
              </div>
            </div>
            <p class="font-label-sm text-label-sm text-on-surface-variant leading-relaxed">
              Trazado sincronizado para navegación fuera de cobertura. Incluye senderos de herradura y pasos de quebrada validados por líderes veredales.
            </p>
          </div>

          <!-- Inventario del Botiquín -->
          <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[22px]">inventory_2</span>
                <h3 class="font-headline-sm text-headline-sm text-primary">Inventario en Vehículo</h3>
              </div>
              <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-semibold">Auditado hoy</span>
            </div>
            <div class="flex flex-col gap-2 mt-1">
              <div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[18px]">vaccines</span>
                  <span class="font-body-md text-body-md text-on-surface font-medium">Vacunas Pentavalente</span>
                </div>
                <span class="font-body-bold text-body-bold text-primary">12 dosis</span>
              </div>
              <div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[18px]">shield</span>
                  <span class="font-body-md text-body-md text-on-surface font-medium">Sueros Antiofídicos</span>
                </div>
                <span class="font-body-bold text-body-bold text-primary">2 ampollas</span>
              </div>
              <div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[18px]">favorite</span>
                  <span class="font-body-md text-body-md text-on-surface font-medium">Doppler Fetal Portátil</span>
                </div>
                <span class="font-body-bold text-body-bold text-primary">1 unidad</span>
              </div>
              <div class="flex items-center justify-between p-2 rounded-lg bg-surface-container-low">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[18px]">monitor_heart</span>
                  <span class="font-body-md text-body-md text-on-surface font-medium">Tensiómetros Aneroide</span>
                </div>
                <span class="font-body-bold text-body-bold text-primary">2 unidades</span>
              </div>
            </div>
            <div class="mt-2 p-2.5 rounded-lg bg-surface-container flex items-center justify-between">
              <div class="flex items-center gap-2 text-primary font-body-bold text-body-bold">
                <span class="material-symbols-outlined text-[20px]">thermostat</span>
                <span>Termo Coleman 9L: +3.8 °C</span>
              </div>
              <span class="font-label-sm text-label-sm text-on-surface-variant font-medium">14h de autonomía</span>
            </div>
          </div>

          <!-- Alertas del Territorio -->
          <div class="bg-surface-container-lowest p-space-md rounded-xl shadow-sm flex flex-col gap-space-sm border-l-4 border-l-tertiary">
            <div class="flex items-center gap-2 text-tertiary">
              <span class="material-symbols-outlined text-[22px]">notification_important</span>
              <h3 class="font-headline-sm text-headline-sm text-tertiary">Alertas del Territorio</h3>
            </div>
            <div class="flex flex-col gap-2">
              <div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col gap-1">
                <div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface font-bold">
                  <span class="flex items-center gap-1 text-primary">
                    <span class="material-symbols-outlined text-[16px]">traffic</span>
                    Paso Quebrada El Salto
                  </span>
                  <span class="text-on-surface-variant">07:15 AM</span>
                </div>
                <p class="font-label-md text-label-md text-on-surface-variant">
                  Paso habilitado en puente de madera provisional. Precaución por lluvias moderadas pronosticadas para la tarde.
                </p>
              </div>
              <div class="p-2.5 rounded-lg bg-surface-container-low flex flex-col gap-1">
                <div class="flex items-center justify-between font-label-sm text-label-sm text-on-surface font-bold">
                  <span class="flex items-center gap-1 text-primary">
                    <span class="material-symbols-outlined text-[16px]">call</span>
                    Radio Base Frecuencia 4
                  </span>
                  <span class="text-on-surface-variant">Enlace activo</span>
                </div>
                <p class="font-label-md text-label-md text-on-surface-variant">
                  Puesto de Salud Ubaque atento como respaldo de evacuación si se requiere puente aéreo o ambulancia fluvial.
                </p>
              </div>
            </div>
          </div>
        </aside>
      </div>

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