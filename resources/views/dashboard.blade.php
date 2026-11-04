<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Panel Principal - RutaSalud Rural') }}
            </h2>
            <a href="{{ route('home') }}" class="inline-flex items-center px-3.5 py-1.5 rounded-lg bg-emerald-700 text-white text-sm hover:bg-emerald-800 transition">
                Portal Público
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-800 font-bold text-xl">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Bienvenido(a), {{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }} • Sesión activa y autenticada</p>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-100 pt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-100">
                        <span class="text-xs font-semibold uppercase text-emerald-800">Estado del Sistema</span>
                        <p class="text-lg font-bold text-emerald-900 mt-1">Extramural Activo</p>
                        <p class="text-xs text-emerald-700 mt-0.5">Microservicio de optimización disponible</p>
                    </div>

                    <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                        <span class="text-xs font-semibold uppercase text-blue-800">API de Rutas</span>
                        <p class="text-lg font-bold text-blue-900 mt-1">Passport OAuth 2.0</p>
                        <p class="text-xs text-blue-700 mt-0.5">Endpoint /api/v1/rutas/optimizar</p>
                    </div>

                    <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
                        <span class="text-xs font-semibold uppercase text-amber-800">Veredas Monitoreadas</span>
                        <p class="text-lg font-bold text-amber-900 mt-1">12 Veredas</p>
                        <p class="text-xs text-amber-700 mt-0.5">Región Ubaté y municipios aledaños</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

