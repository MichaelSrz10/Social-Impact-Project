<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><meta content="web_standard" name="shell-type"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"><link href="https://fonts.googleapis.com" rel="preconnect"><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"><link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&amp;family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"><style>@layer base { html, body { margin: 0; padding: 0; } body { overscroll-behavior: none; } main > :first-child { margin-top: 0 !important; } main > :last-child { margin-bottom: 0 !important; } } ::-webkit-scrollbar { display: none; }</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "primary-fixed-dim": "#8ed3ca", "tertiary-fixed": "#ffe08e", "surface-dim": "#ccdddd", "on-primary-fixed": "#00201d", "on-tertiary-container": "#4f3d00", "on-primary": "#ffffff", "on-error": "#ffffff", "on-error-container": "#93000a", "on-secondary-fixed": "#131e1a", "secondary-fixed": "#d9e5df", "surface": "#ecfdfc", "on-secondary": "#ffffff", "surface-container": "#e0f1f1", "on-tertiary": "#ffffff", "on-primary-fixed-variant": "#00504a", "outline-variant": "#bec9c6", "on-surface-variant": "#3f4947", "on-background": "#0f1e1e", "surface-container-low": "#e6f7f6", "inverse-on-surface": "#e3f4f3", "tertiary-container": "#cea62c", "surface-container-highest": "#d5e6e5", "background": "#ecfdfc", "surface-bright": "#ecfdfc", "primary-fixed": "#aaf0e6", "on-tertiary-fixed": "#241a00", "on-secondary-container": "#5b6762", "primary": "#00453f", "error-container": "#ffdad6", "inverse-primary": "#8ed3ca", "tertiary-fixed-dim": "#ecc246", "error": "#ba1a1a", "surface-container-high": "#daeceb", "on-surface": "#0f1e1e", "on-tertiary-fixed-variant": "#584400", "tertiary": "#755b00", "inverse-surface": "#243333", "surface-container-lowest": "#ffffff", "secondary-container": "#d9e5df", "secondary": "#56615c", "outline": "#6f7977", "primary-container": "#0f5e57", "on-secondary-fixed-variant": "#3e4945", "secondary-fixed-dim": "#bdc9c3", "surface-variant": "#d5e6e5", "on-primary-container": "#90d5cc", "surface-tint": "#206962" }, "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" }, "spacing": { "space-lg": "2rem", "space-md": "1.25rem", "space-sm": "0.75rem", "gutter": "1.25rem", "space-xl": "3.5rem", "gutter-mobile": "1rem", "margin-mobile": "1rem", "margin": "2rem", "space-xs": "0.375rem" }, "fontFamily": { "headline-sm": ["Merriweather"], "body-lg": ["DM Sans"], "headline-lg-mobile": ["Merriweather"], "body-md": ["DM Sans"], "headline-xl-mobile": ["Merriweather"], "body-bold": ["DM Sans"], "headline-lg": ["Merriweather"], "label-md": ["DM Sans"], "headline-xl": ["Merriweather"], "label-sm": ["DM Sans"], "headline-md": ["Merriweather"], "label-lg": ["DM Sans"] }, "fontSize": { "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "700" }], "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }], "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }], "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }], "headline-xl-mobile": ["30px", { "lineHeight": "38px", "fontWeight": "700" }], "body-bold": ["16px", { "lineHeight": "26px", "fontWeight": "700" }], "headline-lg": ["32px", { "lineHeight": "42px", "fontWeight": "700" }], "label-md": ["14px", { "lineHeight": "18px", "fontWeight": "500" }], "headline-xl": ["40px", { "lineHeight": "52px", "fontWeight": "700" }], "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "600" }], "headline-md": ["24px", { "lineHeight": "34px", "fontWeight": "400" }], "label-lg": ["15px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "700" }] } } } };</script></head><body class="bg-background font-body-md text-body-md text-on-surface antialiased min-h-screen flex flex-col"><header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="h-20 max-w-[1200px] mx-auto px-margin flex items-center justify-between gap-gutter"><div class="flex items-center gap-space-lg"><a href="{{ route('home') }}" class="flex items-center gap-space-xs"><span class="material-symbols-outlined text-primary text-[28px]">nature_people</span><div class="flex flex-col"><span class="font-headline-sm text-headline-sm text-primary tracking-tight">RutaSalud Rural</span><span class="font-label-sm text-label-sm text-on-surface-variant font-normal">Atención y Registro Comunitario</span></div></a><nav class="hidden lg:flex items-center gap-space-xs" data-active-classes="bg-surface-container-high text-primary font-bold rounded-lg"><a aria-current="page" class="px-space-sm py-space-xs transition-colors bg-surface-container-high text-primary font-bold rounded-lg" data-path="inicio" href="#">Inicio</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="mis-visitas" href="#">Mis Citas y Visitas</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="mi-familia" href="#">Mi Familia</a><a class="px-space-sm py-space-xs text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md rounded-lg" data-path="ayuda" href="#">Ayuda</a></nav></div><div class="flex items-center gap-space-sm"><button aria-label="Notificaciones sanitarias" class="relative p-2 rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-colors" type="button"><span class="material-symbols-outlined text-[22px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-tertiary-container"></span></button><div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-xs py-1 pr-space-sm rounded-full shadow-[0_1px_6px_rgba(27,42,42,0.06)]"><img alt="Foto de Perfil" class="w-8 h-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&amp;fit=crop&amp;q=80&amp;w=150"><div class="flex flex-col text-left"><span class="font-label-sm text-label-sm text-on-surface font-bold">{{ Auth::user()->name }}</span><span class="font-label-sm text-label-sm text-on-surface-variant capitalize">{{ Auth::user()->role ?? 'Paciente / Hogar' }}</span></div></div><form method="POST" action="{{ route('logout') }}" class="inline">@csrf<button type="submit" class="px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-variant text-on-surface text-xs font-bold transition">Cerrar Sesión</button></form></div></div></header><main class="w-full pt-20 bg-background flex-1 max-w-[1200px] mx-auto px-margin"><div class="flex flex-col w-full"><!-- Banner de Bienvenida Cálido y Estado -->
<div class="w-full mb-space-lg">
  <div class="bg-surface-container rounded-xl shadow-sm p-space-md lg:p-space-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md border border-outline-variant/30">
    <div class="flex flex-col gap-1">
      <div class="flex items-center gap-space-xs flex-wrap">
        <span class="font-headline-lg text-headline-lg text-primary">¡Hola, {{ Auth::user()->name }}!</span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary text-on-primary font-label-sm text-label-sm shadow-sm">
          <span class="material-symbols-outlined text-[16px]">task_alt</span>
          Visita médica programada con éxito
        </span>
      </div>
      <p class="font-body-lg text-body-lg text-on-surface font-normal mt-1">
        Te damos la bienvenida a tu espacio de salud familiar y cuidado en casa.
      </p>
      <p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1.5 mt-0.5">
        <span class="material-symbols-outlined text-[18px] text-primary">home_pin</span>
        Finca El Arrayán • Vereda El Salitre, Choachí
      </p>
    </div>
    <div class="flex items-center gap-space-sm flex-wrap shrink-0">
      <button class="h-12 px-space-md rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center gap-2 shadow-md transition-all active:scale-[0.98]" id="open-solicitud-modal" type="button">
        <span class="material-symbols-outlined text-[22px]">add_circle</span>
        Pedir nueva visita médica
      </button>
    </div>
  </div>
</div>

<!-- Tarjetas Resumen de Bienestar -->
<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-space-md mb-space-lg">
  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20 flex flex-col justify-between">
    <div class="flex items-start justify-between gap-space-sm mb-space-sm">
      <div class="flex flex-col">
        <span class="font-label-sm text-label-sm text-primary font-bold">PRÓXIMA ATENCIÓN EN CASA</span>
        <span class="font-headline-sm text-headline-sm text-on-surface mt-1">Viernes 24 de Octubre</span>
      </div>
      <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary shrink-0">
        <span class="material-symbols-outlined text-[22px]">calendar_clock</span>
      </div>
    </div>
    <div class="bg-surface-container-low p-space-sm rounded-lg flex items-center justify-between">
      <span class="font-body-md text-body-md text-on-surface-variant">Médico asignado</span>
      <span class="font-body-bold text-body-bold text-primary">Dra. Camila Erazo</span>
    </div>
  </div>

  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20 flex flex-col justify-between">
    <div class="flex items-start justify-between gap-space-sm mb-space-sm">
      <div class="flex flex-col">
        <span class="font-label-sm text-label-sm text-primary font-bold">TU FAMILIA PROTEGIDA</span>
        <span class="font-headline-sm text-headline-sm text-on-surface mt-1">3 miembros registrados</span>
      </div>
      <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary shrink-0">
        <span class="material-symbols-outlined text-[22px]">favorite</span>
      </div>
    </div>
    <div class="bg-surface-container-low p-space-sm rounded-lg flex items-center justify-between">
      <span class="font-body-md text-body-md text-on-surface-variant">Vacunas y controles</span>
      <span class="font-body-bold text-body-bold text-on-surface">Al día</span>
    </div>
  </div>

  <div class="bg-surface-container-lowest rounded-xl p-space-md shadow-sm border border-outline-variant/20 flex flex-col justify-between">
    <div class="flex items-start justify-between gap-space-sm mb-space-sm">
      <div class="flex flex-col">
        <span class="font-label-sm text-label-sm text-primary font-bold">MEDICAMENTOS ACTIVOS</span>
        <span class="font-headline-sm text-headline-sm text-on-surface mt-1">2 tratamientos en casa</span>
      </div>
      <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
        <span class="material-symbols-outlined text-[22px]">medication</span>
      </div>
    </div>
    <div class="bg-surface-container-low p-space-sm rounded-lg flex items-center justify-between">
      <span class="font-body-md text-body-md text-on-surface-variant">Entrega programada</span>
      <span class="font-body-bold text-body-bold text-primary">Con la próxima visita</span>
    </div>
  </div>
</div>

<!-- Contenido Principal: Dos Columnas -->
<div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
  <!-- Columna Izquierda: Visita Médica y Familia -->
  <div class="lg:col-span-7 flex flex-col gap-space-lg">
    <!-- Mi Próxima Visita Médica -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md">
      <div class="flex items-center justify-between pb-space-xs">
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary text-[26px]">medical_services</span>
          <h2 class="font-headline-sm text-headline-sm text-on-surface">Mi Próxima Visita Médica en Finca</h2>
        </div>
        <span class="font-label-sm text-label-sm px-3 py-1 rounded-full bg-surface-container text-primary font-bold">
          Confirmada
        </span>
      </div>

      <div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-space-md">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-md rounded-lg shadow-sm">
          <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold text-headline-sm shrink-0">
              <span class="material-symbols-outlined text-[26px]">stethoscope</span>
            </div>
            <div class="flex flex-col">
              <span class="font-label-sm text-label-sm text-on-surface-variant">Médica que te visitará</span>
              <span class="font-body-bold text-body-bold text-on-surface">Dra. Camila Erazo</span>
              <span class="font-body-md text-body-md text-primary">Centro de Salud Choachí</span>
            </div>
          </div>
          <div class="flex flex-col sm:items-end text-left sm:text-right">
            <span class="font-label-sm text-label-sm text-on-surface-variant">Fecha y hora estimada</span>
            <span class="font-body-bold text-body-bold text-on-surface">24 de Octubre • 9:30 AM</span>
            <span class="font-label-sm text-label-sm text-primary font-medium">Transporte veredal asignado</span>
          </div>
        </div>

        <div class="p-space-sm bg-surface-container-lowest rounded-lg flex items-start gap-3">
          <span class="material-symbols-outlined text-primary text-[22px] shrink-0 mt-0.5">fact_check</span>
          <div class="flex flex-col">
            <span class="font-body-bold text-body-bold text-on-surface">Motivo de la atención:</span>
            <p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
              Revisión de tensión arterial para Don Pedro, control de crecimiento de Valentina y entrega de formulación de enalapril y losartán.
            </p>
          </div>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row items-center gap-space-sm pt-space-xs">
        <button class="w-full sm:w-auto h-12 px-space-md rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-lg text-label-lg flex items-center justify-center gap-2 transition-colors" type="button">
          <span class="material-symbols-outlined text-[18px]">visibility</span>
          Ver detalles de mi visita
        </button>
        <button class="w-full sm:w-auto h-12 px-space-md rounded-lg bg-surface-container-lowest hover:bg-surface-container-low text-on-surface font-label-lg text-label-lg flex items-center justify-center gap-2 transition-colors shadow-sm border border-outline-variant/30" id="download-voucher-btn" type="button">
          <span class="material-symbols-outlined text-[18px]">download_for_offline</span>
          Descargar comprobante sin internet
        </button>
      </div>
    </div>

    <!-- Mi Hogar y Familia -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary text-[26px]">family_restroom</span>
          <h2 class="font-headline-sm text-headline-sm text-on-surface">Mi Hogar y Familia</h2>
        </div>
        <button class="h-10 px-3 rounded-lg bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md flex items-center gap-1.5 transition-colors" type="button">
          <span class="material-symbols-outlined text-[18px]">person_add</span>
          + Agregar familiar
        </button>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm">
        <div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-2 hover:bg-surface-container transition-colors">
          <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold text-label-md">
              R
            </div>
            <div class="flex flex-col">
              <span class="font-body-bold text-body-bold text-on-surface">Rosalba</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">68 años • Titular</span>
            </div>
          </div>
          <span class="font-label-sm text-label-sm text-primary font-medium mt-1">Hipertensión controlada</span>
        </div>

        <div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-2 hover:bg-surface-container transition-colors">
          <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-surface-container-highest text-primary flex items-center justify-center font-bold text-label-md">
              P
            </div>
            <div class="flex flex-col">
              <span class="font-body-bold text-body-bold text-on-surface">Don Pedro</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">71 años • Esposo</span>
            </div>
          </div>
          <span class="font-label-sm text-label-sm text-primary font-medium mt-1">Control médico programado</span>
        </div>

        <div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-2 hover:bg-surface-container transition-colors">
          <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-surface-container-highest text-primary flex items-center justify-center font-bold text-label-md">
              V
            </div>
            <div class="flex flex-col">
              <span class="font-body-bold text-body-bold text-on-surface">Valentina</span>
              <span class="font-label-sm text-label-sm text-on-surface-variant">4 años • Nieta</span>
            </div>
          </div>
          <span class="font-label-sm text-label-sm text-primary font-medium mt-1">Carné de vacunas al día</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Columna Derecha: Medicamentos, Contacto y Urgencias -->
  <div class="lg:col-span-5 flex flex-col gap-space-lg">
    <!-- Mis Medicamentos y Cuidados -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined text-primary text-[24px]">pill</span>
          <h2 class="font-headline-sm text-headline-sm text-on-surface">Mis Medicamentos y Cuidados</h2>
        </div>
      </div>
      <div class="flex flex-col gap-space-sm">
        <div class="p-space-sm bg-surface-container-low rounded-xl flex items-center justify-between gap-space-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary shrink-0">
              <span class="material-symbols-outlined text-[20px]">sunny</span>
            </div>
            <div class="flex flex-col">
              <span class="font-body-bold text-body-bold text-on-surface">Losartán 50mg</span>
              <span class="font-body-md text-body-md text-on-surface-variant">1 pastilla cada mañana con el desayuno</span>
            </div>
          </div>
          <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
        </div>
        <div class="p-space-sm bg-surface-container-low rounded-xl flex items-center justify-between gap-space-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary shrink-0">
              <span class="material-symbols-outlined text-[20px]">visibility</span>
            </div>
            <div class="flex flex-col">
              <span class="font-body-bold text-body-bold text-on-surface">Gotas lubricantes de ojos</span>
              <span class="font-body-md text-body-md text-on-surface-variant">2 gotas en la noche antes de dormir</span>
            </div>
          </div>
          <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
        </div>
      </div>
    </div>

    <!-- Hablar con el Centro de Salud -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant/20 p-space-md lg:p-space-lg flex flex-col gap-space-md">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[24px]">support_agent</span>
        <h2 class="font-headline-sm text-headline-sm text-on-surface">Hablar con el Centro de Salud</h2>
      </div>
      <p class="font-body-md text-body-md text-on-surface-variant">
        ¿Tienes dudas o necesitas reprogramar tu visita? Puedes escribirnos o llamarnos directamente:
      </p>
      <div class="flex flex-col gap-space-sm">
        <a class="h-12 w-full px-space-md rounded-lg bg-surface-container-low hover:bg-surface-container text-primary font-label-lg text-label-lg flex items-center justify-between transition-colors border border-outline-variant/30" href="https://wa.me/573124589201" rel="noopener noreferrer" target="_blank">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[22px]">chat</span>
            <span class="">Escribir por WhatsApp</span>
          </div>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>
        <a class="h-12 w-full px-space-md rounded-lg bg-surface-container-low hover:bg-surface-container text-primary font-label-lg text-label-lg flex items-center justify-between transition-colors border border-outline-variant/30" href="tel:3124589201">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[22px]">call</span>
            <span class="">Llamar al Centro de Salud Choachí</span>
          </div>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>
      </div>
    </div>

    <!-- ¿Tienes una urgencia? -->
    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-error-container/60 p-space-md flex flex-col gap-space-sm">
      <div class="flex items-center gap-2 text-on-error-container">
        <span class="material-symbols-outlined text-[22px]">emergency</span>
        <span class="font-body-bold text-body-bold text-on-surface">¿Tienes una urgencia médica en tu casa?</span>
      </div>
      <p class="font-body-md text-body-md text-on-surface-variant">
        Comunícate de inmediato con la línea de socorro y ambulancia rural:
      </p>
      <a class="h-12 w-full rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-md transition-all active:scale-[0.98]" href="tel:123">
        <span class="material-symbols-outlined text-[20px]">phone_in_talk</span>
        Llamar al 123 de Inmediato
      </a>
    </div>
  </div>
</div>

<!-- Modal de Solicitud Adaptado -->
<div class="fixed inset-0 z-50 bg-on-background/40 backdrop-blur-sm hidden flex items-center justify-center p-4" id="solicitud-modal">
  <div class="bg-surface-container-lowest rounded-xl max-w-lg w-full p-space-md lg:p-space-lg shadow-xl flex flex-col gap-space-md max-h-[921px] overflow-y-auto border border-outline-variant/30">
    <div class="flex items-center justify-between pb-space-xs">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary text-[24px]">assignment_add</span>
        <h3 class="font-headline-sm text-headline-sm text-on-surface">Pedir Visita Médica en Mi Hogar</h3>
      </div>
      <button class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container" id="close-solicitud-modal" type="button">
        <span class="material-symbols-outlined text-[20px]">close</span>
      </button>
    </div>
    <form class="flex flex-col gap-space-sm" id="visita-form">
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface">¿Para quién es la visita médica?</label>
        <select class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
          <option>Rosalba Martínez (Titular)</option>
          <option>Don Pedro (Esposo - 71 años)</option>
          <option>Valentina (Nieta - 4 años)</option>
          <option>Otro familiar en casa</option>
        </select>
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface">Motivo de la atención</label>
        <select class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary">
          <option>Control de tensión / medicina habitual</option>
          <option>Revisión médica para adulto mayor</option>
          <option>Vacunación o control infantil</option>
          <option>Malestar general o dolor continuo</option>
          <option>Dificultad de movilidad para salir de la finca</option>
        </select>
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface">¿Cómo llegar a tu finca?</label>
        <input class="h-12 px-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary" type="text" value="Finca El Arrayán, 300m arriba de la escuela El Salitre">
      </div>
      <div class="flex flex-col gap-1">
        <label class="font-label-md text-label-md text-on-surface">Cuéntanos más sobre cómo se siente</label>
        <textarea class="p-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Escribe brevemente los síntomas o si necesitas algo en particular para la visita" rows="2"></textarea>
      </div>
      <div class="p-3 rounded-lg bg-surface-container flex items-center gap-2 mt-1">
        <span class="material-symbols-outlined text-primary text-[20px]">verified</span>
        <span class="font-label-sm text-label-sm text-on-surface-variant">Tu solicitud quedará guardada en tu teléfono y se enviará al equipo de salud.</span>
      </div>
      <div class="flex items-center justify-end gap-space-sm pt-space-xs mt-2">
        <button class="h-12 px-space-md rounded-lg bg-surface-container text-on-surface-variant font-label-lg text-label-lg" id="cancel-solicitud-btn" type="button">
          Cancelar
        </button>
        <button class="h-12 px-space-md rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg" type="submit">
          Enviar Solicitud
        </button>
      </div>
    </form>
  </div>
</div>

<div class="fixed bottom-6 right-6 z-50 bg-primary text-on-primary px-space-md py-3 rounded-lg shadow-xl hidden items-center gap-2" id="toast-notification">
  <span class="material-symbols-outlined text-[20px]">check_circle</span>
  <span class="font-body-bold text-body-bold">¡Solicitud guardada con éxito en tu dispositivo!</span>
</div></div>
<script>
  (function() {
    const modal = document.getElementById('solicitud-modal');
    const openBtn = document.getElementById('open-solicitud-modal');
    const closeBtn = document.getElementById('close-solicitud-modal');
    const cancelBtn = document.getElementById('cancel-solicitud-btn');
    const form = document.getElementById('visita-form');
    const downloadBtn = document.getElementById('download-voucher-btn');
    const toast = document.getElementById('toast-notification');

    function openModal() {
      if (modal) modal.classList.remove('hidden');
    }

    function closeModal() {
      if (modal) modal.classList.add('hidden');
    }

    if (openBtn) openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    if (form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        closeModal();
        if (toast) {
          toast.classList.remove('hidden');
          toast.classList.add('flex');
          setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
          }, 3500);
        }
      });
    }

    if (downloadBtn && toast) {
      downloadBtn.addEventListener('click', function() {
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        setTimeout(() => {
          toast.classList.add('hidden');
          toast.classList.remove('flex');
        }, 3500);
      });
    }
  })();
</script></main><footer class="w-full bg-surface-container-low shadow-[0_1px_8px_rgba(0,0,0,0.03)] mt-space-xl"><div class="max-w-[1200px] mx-auto px-margin py-space-lg flex flex-col md:flex-row items-center justify-between gap-space-md"><div class="flex flex-col gap-1 text-center md:text-left"><span class="font-headline-sm text-headline-sm text-primary">RutaSalud Rural</span><p class="font-body-md text-body-md text-on-surface-variant">Sistema Integral de Atención Primaria para Zonas Dispersas y Veredas</p></div><div class="flex flex-wrap justify-center gap-space-md font-label-md text-label-md text-on-surface-variant"><a class="hover:text-primary transition-colors" data-path="guia-de-campo" href="#">Guía de Campo Offline</a><a class="hover:text-primary transition-colors" data-path="protocolos-msps" href="#">Protocolos MSPS</a><a class="hover:text-primary transition-colors" data-path="soporte-tecnico" href="#">Soporte Técnico</a></div><p class="font-label-sm text-label-sm text-on-surface-variant text-center">© 2024 Red de Salud Rural Comunitaria. Todos los derechos reservados.</p></div></footer>

</body></html>