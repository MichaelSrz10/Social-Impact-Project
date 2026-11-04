<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="web_blank" name="shell-type" />
  
  <!-- Fonts & Symbols -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet" />
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
            "error-container": "#ffdad6",
            "on-secondary": "#ffffff",
            "on-primary-fixed": "#00201d",
            "tertiary-fixed-dim": "#ecc246",
            "surface-bright": "#ecfdfc",
            "surface-variant": "#d5e6e5",
            "secondary": "#56615c",
            "on-primary": "#ffffff",
            "primary-fixed": "#aaf0e6",
            "tertiary-fixed": "#ffe08e",
            "surface-container": "#e0f1f1",
            "surface-container-low": "#e6f7f6",
            "on-error-container": "#93000a",
            "tertiary": "#755b00",
            "inverse-primary": "#8ed3ca",
            "on-tertiary-fixed": "#241a00",
            "background": "#ecfdfc",
            "on-surface": "#0f1e1e",
            "on-error": "#ffffff",
            "error": "#ba1a1a",
            "inverse-on-surface": "#e3f4f3",
            "surface-container-highest": "#d5e6e5",
            "on-background": "#0f1e1e",
            "outline": "#6f7977",
            "primary": "#00453f",
            "surface-container-lowest": "#ffffff",
            "on-secondary-container": "#5b6762",
            "on-surface-variant": "#3f4947",
            "inverse-surface": "#243333",
            "surface-tint": "#206962",
            "on-tertiary-container": "#4f3d00",
            "on-secondary-fixed": "#131e1a",
            "surface": "#ecfdfc",
            "on-primary-container": "#90d5cc",
            "outline-variant": "#bec9c6",
            "secondary-fixed-dim": "#bdc9c3",
            "on-tertiary": "#ffffff",
            "secondary-fixed": "#d9e5df",
            "surface-container-high": "#daeceb",
            "on-secondary-fixed-variant": "#3e4945",
            "on-primary-fixed-variant": "#00504a",
            "on-tertiary-fixed-variant": "#584400",
            "primary-container": "#0f5e57",
            "surface-dim": "#ccdddd",
            "primary-fixed-dim": "#8ed3ca",
            "tertiary-container": "#cea62c",
            "secondary-container": "#d9e5df"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "spacing": {
            "margin": "2rem",
            "gutter-mobile": "1rem",
            "gutter": "1.25rem",
            "margin-mobile": "1rem",
            "space-sm": "0.75rem",
            "space-xl": "3.5rem",
            "space-xs": "0.375rem",
            "space-lg": "2rem",
            "space-md": "1.25rem"
          },
          "fontFamily": {
            "headline-lg-mobile": ["Merriweather"],
            "label-lg": ["DM Sans"],
            "headline-xl-mobile": ["Merriweather"],
            "body-bold": ["DM Sans"],
            "headline-lg": ["Merriweather"],
            "body-md": ["DM Sans"],
            "label-md": ["DM Sans"],
            "label-sm": ["DM Sans"],
            "headline-xl": ["Merriweather"],
            "headline-sm": ["Merriweather"],
            "headline-md": ["Merriweather"],
            "body-lg": ["DM Sans"]
          },
          "fontSize": {
            "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }],
            "label-lg": ["15px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "700" }],
            "headline-xl-mobile": ["30px", { "lineHeight": "38px", "fontWeight": "700" }],
            "body-bold": ["16px", { "lineHeight": "26px", "fontWeight": "700" }],
            "headline-lg": ["32px", { "lineHeight": "42px", "fontWeight": "700" }],
            "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }],
            "label-md": ["14px", { "lineHeight": "18px", "fontWeight": "500" }],
            "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "600" }],
            "headline-xl": ["40px", { "lineHeight": "52px", "fontWeight": "700" }],
            "headline-sm": ["20px", { "lineHeight": "28px", "fontWeight": "700" }],
            "headline-md": ["24px", { "lineHeight": "34px", "fontWeight": "400" }],
            "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }]
          }
        }
      }
    };
  </script>
</head>

<body class="bg-surface font-body-md text-body-md text-on-surface antialiased min-h-screen flex flex-col justify-between py-8 px-4">
  <main class="w-full max-w-[980px] mx-auto my-auto">
    <!-- Header / Navbar -->
    <div class="flex items-center justify-between mb-8 px-2">
      <div class="flex items-center gap-2">
        <div class="w-9 h-9 rounded-lg bg-primary flex items-center justify-center text-on-primary shadow-sm">
          <span class="material-symbols-outlined text-[20px]">vital_signs</span>
        </div>
        <span class="font-headline-sm text-headline-sm text-primary tracking-tight font-bold">RutaSalud Rural</span>
      </div>
      <a class="inline-flex items-center gap-1 font-label-md text-label-md text-secondary hover:text-primary transition-colors" href="#">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        <span>Volver</span>
      </a>
    </div>

    <!-- Login Card Container -->
    <div class="bg-surface-container-lowest rounded-xl shadow-xl border border-surface-container overflow-hidden grid grid-cols-1 md:grid-cols-2">
      
      <!-- Side Image Banner -->
      <div class="relative min-h-[280px] md:min-h-full flex flex-col justify-end p-6 md:p-8 bg-surface-container overflow-hidden">
        <img alt="Campesinos sonrientes en el campo colombiano" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJQpyi1eVc8nPA6BhVhLyvkfh2llfBymLYBjVTANo0cCT-fWdDDBDdzs5tiFNOuoLzwEU26WhE8eTmSZrQELE0eZI9i-izN2FgBwL6WQV57YpdkpkbsoNkJxU8MudCmF03TmPjhn9urSu9bXBcm5JEwU1ByaOGa9K0aNzgS-DLWVAepoZ3UPWB3EA0mZLiejlFiBhq9SCZW71WgqsFnCABknp4q6MKhFzRANVBQ0w" />
        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/30 to-transparent"></div>
        <div class="relative z-10">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-bright/90 backdrop-blur-sm text-primary font-label-sm text-label-sm font-bold shadow-sm mb-2">
            <span class="material-symbols-outlined text-[16px]">favorite</span> Cuidando a nuestros mayores · RutaSalud Rural
          </span>
          <p class="text-on-primary font-headline-sm text-headline-sm drop-shadow-sm">Salud digna y cercana en cada rincón de Colombia</p>
        </div>
      </div>

      <!-- Login Form Section -->
      <div class="p-space-lg md:p-space-xl flex flex-col justify-center">
        <div class="text-center mb-6">
          <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mb-1.5">Iniciar Sesión</h1>
          <p class="font-body-md text-body-md text-on-surface-variant">Ingresa a tu cuenta de RutaSalud Rural</p>
        </div>

        <!-- Role Selector -->
        <div class="mb-6">
          <div class="grid grid-cols-2 gap-1 p-1 bg-surface-container rounded-xl">
            <button class="py-2.5 px-3 rounded-lg font-label-md text-label-md font-body-bold transition-all duration-200 bg-surface-container-lowest text-primary shadow-sm text-center" id="role-tab-citizen" onclick="selectRole('citizen')" type="button">
              Soy Ciudadano
            </button>
            <button class="py-2.5 px-3 rounded-lg font-label-md text-label-md font-body-bold transition-all duration-200 text-on-surface-variant hover:text-primary text-center" id="role-tab-staff" onclick="selectRole('staff')" type="button">
              Personal de Salud
            </button>
          </div>
        </div>

        <!-- Form -->
        <form class="space-y-space-md" id="login-form" onsubmit="handleLoginSubmit(event)">
          <!-- Document Field -->
          <div>
            <label class="block font-label-md text-label-md text-on-surface mb-1.5" for="doc-number">Documento de Identidad</label>
            <div class="flex gap-2">
              <div class="relative w-32 shrink-0">
                <select class="w-full h-[50px] bg-surface-container-low text-on-surface font-body-md text-body-md px-3 pr-8 rounded-lg outline-none appearance-none focus:bg-surface-container transition-colors" id="doc-type">
                  <option value="CC">C.C.</option>
                  <option value="TI">T.I.</option>
                  <option value="CE">C.E.</option>
                  <option value="PPT">PPT</option>
                </select>
                <span class="material-symbols-outlined absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none text-secondary text-[18px]">expand_more</span>
              </div>
              <div class="relative flex-1">
                <input class="w-full h-[50px] bg-surface-container-low text-on-surface font-body-md text-body-md px-4 rounded-lg outline-none focus:bg-surface-container transition-colors placeholder:text-outline" id="doc-number" placeholder="Número de documento" required="" type="text" />
              </div>
            </div>
          </div>

          <!-- Password Field -->
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block font-label-md text-label-md text-on-surface" for="password">Contraseña</label>
              <a class="font-label-sm text-label-sm text-primary hover:underline" href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="relative flex items-center">
              <input class="w-full h-[50px] bg-surface-container-low text-on-surface font-body-md text-body-md px-4 pr-11 rounded-lg outline-none focus:bg-surface-container transition-colors placeholder:text-outline" id="password" placeholder="••••••••" required="" type="password" />
              <button class="absolute right-3 text-secondary hover:text-on-surface" onclick="togglePasswordVisibility('password', this)" type="button">
                <span class="material-symbols-outlined text-[20px]">visibility</span>
              </button>
            </div>
          </div>

          <!-- Remember Me Checkbox -->
          <div class="flex items-center pt-0.5">
            <label class="flex items-center gap-2 cursor-pointer select-none">
              <input checked="" class="w-4 h-4 rounded text-primary focus:ring-0 accent-primary cursor-pointer" id="remember-session" type="checkbox" />
              <span class="font-body-md text-body-md text-on-surface-variant">Recordar sesión</span>
            </label>
          </div>

          <!-- Submit Button -->
          <button class="w-full h-[50px] bg-primary text-on-primary rounded-lg font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-md hover:bg-primary-container transition-colors active:scale-[0.99] mt-2" id="submit-btn" type="submit">
            <span>Ingresar a mi cuenta</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </button>
        </form>

        <!-- Register Link -->
        <div class="pt-6 border-t border-surface-container mt-6 text-center">
          <p class="font-body-md text-body-md text-on-surface-variant">
            ¿Aún no tienes cuenta? <a class="font-body-bold text-primary hover:underline" href="#">Regístrate aquí</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-8 text-secondary font-label-sm text-label-sm">
      <p>© 2025 RutaSalud Rural • Red Nacional ESE • MinSalud Colombia</p>
    </footer>
  </main>
</body>

</html>