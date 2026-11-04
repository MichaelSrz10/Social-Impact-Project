# Microservicio de Optimización de Rutas de Atención en Salud Rural

Microservicio backend desarrollado en **Laravel 13** y **PHP 8.5** para la priorización y optimización de rutas de desplazamiento de brigadas médicas en zonas rurales de Cundinamarca (Valle de Ubaté).

---

## 1. Problema que Resuelve

Las brigadas médicas que atienden zonas rurales dispersas enfrentan restricciones severas de tiempo, combustible y personal. Desplazarse sin un orden óptimo genera:
- Desperdicio de kilómetros y horas de viaje.
- Postergación de comunidades con condiciones críticas de vulnerabilidad.
- Falta de trazabilidad en la toma de decisiones logísticas.

Este microservicio automatiza la selección de las **5 veredas prioritarias** basándose en su nivel de vulnerabilidad y resuelve el problema de recorrido mínimo partiendo de un centro de salud de referencia (**Punto Cero**), utilizando un algoritmo heurístico de **Vecino Más Cercano (Nearest Neighbor)** basado en la fórmula ortodrómica de **Haversine**.

---

## 2. Arquitectura del Sistema (MVC + Service Pattern)

El proyecto separa estrictamente la capa de transporte HTTP de la lógica matemática de optimización:

- **Capa HTTP / Controladores (`app/Http/Controllers/Api/`):**
  - `AuthController`: Emisión de tokens de acceso personal OAuth 2.0 mediante Laravel Passport.
  - `RutaController`: Controlador delgado. Recibe la petición validada, delega la optimización al servicio y retorna un recurso transformado.
- **Capa de Validación (`app/Http/Requests/`):**
  - `OptimizarRutaRequest`: Valida coordenadas geográficas (-90..90, -180..180), cardinalidad de veredas (5 a 15), IDs únicos y rangos de vulnerabilidad (1..10) con mensajes en español.
- **Capa de Negocio / Servicios (`app/Services/`):**
  - `RouteOptimizerService`: Lógica pura y agnóstica de HTTP. Contiene los métodos `selectTopVulnerable`, `haversine`, `nearestNeighbor` y `optimize`.
- **Capa de Presentación / Transformación (`app/Http/Resources/`):**
  - `RutaResource`: Garantiza que el JSON de salida cumpla con el contrato estricto acordado para el frontend.
- **Capa de Seguridad y Auditoría (`app/Http/Middleware/`):**
  - `AuditoriaRuta`: Registra cada petición autenticada, sus parámetros depurados, el código de estado y el resultado en la tabla `audit_logs`, vinculando el `audit_id` en los metadatos de la respuesta antes de devolverla al cliente.
  - Sanitización recursiva: Prohibido almacenar tokens, contraseñas o encabezados de autorización.

---

## 3. Tecnologías y Versiones Reales

- **PHP:** `8.5.6`
- **Laravel Framework:** `13.40.0`
- **Laravel Passport:** `^13.10`
- **Base de Datos:** SQLite 3 (desarrollo ágil / testing) / Compatible con MySQL 8.x
- **Testing:** PHPUnit `12.5.12` / Test suite integrado en Artisan

---

## 4. Requisitos e Instalación

### Requisitos Previos
- PHP >= 8.3 con extensiones `pdo_sqlite`, `openssl`, `mbstring`, `curl`.
- Composer >= 2.8.

### Pasos de Instalación

```bash
# 1. Clonar repositorio y entrar al directorio
git clone <url-repositorio>
cd Social-Impact-Project

# 2. Instalar dependencias PHP
composer install

# 3. Configurar variables de entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar SQLite para desarrollo
touch database/database.sqlite
```

Asegurar en `.env`:
```dotenv
DB_CONNECTION=sqlite
# Comentar las variables DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD de MySQL
```

```bash
# 5. Ejecutar migraciones
php artisan migrate

# 6. Configurar Laravel Passport (claves y cliente personal)
php artisan passport:keys --force
php artisan passport:client --personal --name="Salud Rural" --provider=users --no-interaction

# 7. Ejecutar Seeder con usuario demo y verificación de datos
php artisan db:seed --class=DemoDataSeeder

# 8. Iniciar el servidor local
php artisan serve
```
El servidor quedará disponible en `http://127.0.0.1:8000`.

---

## 5. Autenticación y Credenciales Demo

- **Método:** Bearer Token (Personal Access Token de Passport).
- **Usuario Demo:**
  - **Email:** `admin@saludrural.gov.co`
  - **Password:** `secret123`

---

## 6. Especificación de la API (Contrato Estricto)

### 1) POST `/api/v1/auth/login`
Autentica al usuario y entrega el Bearer Token.

**Solicitud:**
```http
POST /api/v1/auth/login HTTP/1.1
Content-Type: application/json
Accept: application/json

{
  "email": "admin@saludrural.gov.co",
  "password": "secret123"
}
```

**Respuesta 200 OK:**
```json
{
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIs...",
  "token_type": "Bearer",
  "user": {
    "id": 1,
    "name": "Admin Salud Rural",
    "email": "admin@saludrural.gov.co"
  }
}
```

---

### 2) POST `/api/v1/rutas/optimizar`
Optimiza el recorrido seleccionando las 5 veredas más vulnerables y ordenándolas con Vecino Más Cercano desde el punto cero.

**Middlewares aplicados:** `auth:api`, `throttle:60,1`, `auditoria`.

**Solicitud:**
```http
POST /api/v1/rutas/optimizar HTTP/1.1
Authorization: Bearer <access_token>
Content-Type: application/json
Accept: application/json

{
  "punto_cero": {
    "lat": 5.3085,
    "lng": -73.8145
  },
  "veredas": [
    {"id": 1, "nombre": "Ojo de Agua", "lat": 5.3190, "lng": -73.8240, "vulnerabilidad": 8},
    {"id": 2, "nombre": "Soagá", "lat": 5.2950, "lng": -73.8050, "vulnerabilidad": 6},
    {"id": 3, "nombre": "Palogordo", "lat": 5.2480, "lng": -73.8520, "vulnerabilidad": 9},
    {"id": 4, "nombre": "Peñas de Boquerón", "lat": 5.2310, "lng": -73.8640, "vulnerabilidad": 7},
    {"id": 5, "nombre": "Ramal", "lat": 5.3120, "lng": -73.7150, "vulnerabilidad": 10},
    {"id": 6, "nombre": "Paunita", "lat": 5.2890, "lng": -73.7320, "vulnerabilidad": 8},
    {"id": 7, "nombre": "Juaitoque", "lat": 5.2650, "lng": -73.7890, "vulnerabilidad": 9},
    {"id": 8, "nombre": "La Capilla", "lat": 5.2510, "lng": -73.7680, "vulnerabilidad": 5},
    {"id": 9, "nombre": "Miña y Rinconada", "lat": 5.4220, "lng": -73.6820, "vulnerabilidad": 7},
    {"id": 10, "nombre": "Tagua", "lat": 5.4050, "lng": -73.6990, "vulnerabilidad": 4},
    {"id": 11, "nombre": "Hato Grande", "lat": 5.3480, "lng": -73.9120, "vulnerabilidad": 8},
    {"id": 12, "nombre": "Nemogá", "lat": 5.4190, "lng": -73.7840, "vulnerabilidad": 6}
  ]
}
```

**Respuesta 200 OK:**
```json
{
  "data": {
    "punto_cero": {
      "lat": 5.3085,
      "lng": -73.8145
    },
    "ruta": [
      {
        "orden": 1,
        "id": 1,
        "nombre": "Ojo de Agua",
        "lat": 5.319,
        "lng": -73.824,
        "vulnerabilidad": 8,
        "distancia_desde_anterior_km": 1.57
      },
      {
        "orden": 2,
        "id": 7,
        "nombre": "Juaitoque",
        "lat": 5.265,
        "lng": -73.789,
        "vulnerabilidad": 9,
        "distancia_desde_anterior_km": 7.15
      },
      {
        "orden": 3,
        "id": 3,
        "nombre": "Palogordo",
        "lat": 5.248,
        "lng": -73.852,
        "vulnerabilidad": 9,
        "distancia_desde_anterior_km": 7.26
      },
      {
        "orden": 4,
        "id": 6,
        "nombre": "Paunita",
        "lat": 5.289,
        "lng": -73.732,
        "vulnerabilidad": 8,
        "distancia_desde_anterior_km": 14.07
      },
      {
        "orden": 5,
        "id": 5,
        "nombre": "Ramal",
        "lat": 5.312,
        "lng": -73.715,
        "vulnerabilidad": 10,
        "distancia_desde_anterior_km": 3.22
      }
    ],
    "distancia_total_km": 33.27,
    "algoritmo": "nearest_neighbor_haversine"
  },
  "meta": {
    "generado_por": "Admin Salud Rural",
    "generado_en": "2026-11-04T14:50:00+00:00",
    "audit_id": 1
  }
}
```

**Respuesta 401 Unauthorized:**
```json
{
  "message": "Unauthenticated."
}
```

**Respuesta 422 Unprocessable Entity:**
```json
{
  "message": "Debe enviar al menos 5 veredas. (and 1 more error)",
  "errors": {
    "veredas": [
      "Debe enviar al menos 5 veredas."
    ]
  }
}
```

---

## 7. Datos de Demostración y Punto Cero

- **Archivo de datos:** `database/data/veredas.json` (12 veredas simuladas del Valle de Ubaté, Sutatausa, Cucunubá, Lenguazaque, Guachetá, Carmen de Carupa y Fúquene).
- **Punto Cero Simulado:**
  - **Latitud:** `5.3085`
  - **Longitud:** `-73.8145`
  - **Referencia:** Centro de Salud / Hospital El Salvador de Ubaté (punto de salida de la brigada).
  *(Nota: Coordenadas ficticias de referencia logística para fines de demostración académica).*

---

## 8. Explicación del Algoritmo Heurístico

1. **Filtro y Priorización de Vulnerabilidad (`selectTopVulnerable`):**
   - Ordena las veredas por vulnerabilidad descendente ($10 \to 1$).
   - En caso de empate en vulnerabilidad, desempata priorizando la vereda con menor distancia ortodrómica al Punto Cero.
   - Selecciona exactamente las primeras 5 veredas.
2. **Cálculo de Distancia Ortodrómica (`haversine`):**
   $$\Delta \text{lat} = \text{lat}_2 - \text{lat}_1, \quad \Delta \text{lng} = \text{lng}_2 - \text{lng}_1$$
   $$a = \sin^2\left(\frac{\Delta \text{lat}}{2}\right) + \cos(\text{lat}_1)\cos(\text{lat}_2)\sin^2\left(\frac{\Delta \text{lng}}{2}\right)$$
   $$c = 2 \cdot \text{atan2}\left(\sqrt{a}, \sqrt{1-a}\right)$$
   $$d = R \cdot c \quad (\text{con } R = 6371.0 \text{ km})$$
3. **Ordenamiento Heurístico (`nearestNeighbor`):**
   - Partiendo del Punto Cero como posición actual, selecciona la vereda no visitada más cercana.
   - Se desplaza a dicha vereda, acumula la distancia recorrida y repite el proceso hasta agotar las 5 seleccionadas.
   - Complejidad temporal: $\mathcal{O}(k^2)$ para $k=5$, ejecutándose en menos de 1 milisegundo.

---

## 9. Sistema de Auditoría

El middleware `AuditoriaRuta` intercepta la petición dentro del ciclo de vida HTTP:
1. Crea un registro preliminar en la tabla `audit_logs` con `user_id`, `endpoint`, `ip` y los parámetros limpios.
2. Extrae el `audit_id` generado y lo suministra al flujo de la petición.
3. El `RutaResource` inyecta este `audit_id` en `meta.audit_id`.
4. El middleware captura la respuesta final, sincroniza el resultado en la base de datos y retorna la respuesta al frontend con la garantía de que `meta.audit_id === audit_logs.id`.
5. Filtro de Seguridad: Se excluyen recursivamente contraseñas, tokens y cabeceras de autorización.

---

## 10. Pruebas Automatizadas

Para ejecutar la suite completa de pruebas:
```bash
php artisan test
```

### Cobertura de Pruebas:
- `tests/Unit/RouteOptimizerServiceTest.php`:
  - Cálculo Haversine con distancias geodésicas conocidas.
  - Selección de Top 5 y resolución de empates por cercanía al punto cero.
  - Ordenamiento correlativo por Vecino Más Cercano y distancia acumulada.
- `tests/Unit/VeredasDatasetTest.php`:
  - Integridad estructural del JSON de 12 veredas, coordenadas válidas e IDs únicos.
- `tests/Feature/AuthApiTest.php`:
  - Emisión de token Bearer (200) y rechazo con credenciales inválidas (401).
- `tests/Feature/RutaApiTest.php`:
  - Validación de esquema de respuesta 200 conforme al contrato.
  - Validación de 401 sin token y 422 con datos inválidos.
  - Prueba de integración end-to-end con el dataset `veredas.json`.
- `tests/Feature/AuditoriaRutaTest.php`:
  - Persistencia de usuario autenticado, parámetros y respuesta en `audit_logs`.
  - Concordancia estricta entre `meta.audit_id` de la respuesta y el ID en base de datos.
  - Sanitización de datos sensibles.
  - Registro de solicitudes 422 y omisión en peticiones 401.

---

## 11. Documentación Ética y Limitaciones del Modelo

1. **Herramienta de Priorización Logística, No de Clasificación Social:**
   El índice de vulnerabilidad (1 a 10) es un insumo numérico operativo para organizar turnos de visita médica y **no constituye un juicio ni una etiqueta sobre el valor, identidad o dignidad de las comunidades**.
2. **Naturaleza de los Datos:**
   Los datos incluidos en este repositorio son **completamente simulados y ficticios**. No corresponden a historias clínicas, diagnósticos epidemiológicos ni registros confidenciales de personas reales.
3. **El Algoritmo No Sustituye el Criterio Clínico:**
   La ruta generada es una recomendación matemática de menor distancia euclidiana/ortodrómica. **El personal de salud y los coordinadores de brigada tienen la potestad y responsabilidad final** de alterar el orden de visita ante urgencias médicas sobrevinientes, condiciones climáticas adversas o estados de transitabilidad de las vías terciarias.
4. **Prevención de Sesgos:**
   Los algoritmos basados puramente en proximidad geográfica pueden provocar la postergación sistemática de comunidades ubicadas en el extremo geográfico más lejano ("zonas trampa"). Se recomienda al equipo médico evaluar manualmente aquellas veredas que acumulen períodos prolongados sin atención, independientemente de su distancia al punto cero.
5. **Revisión Humana y Actualización Continua:**
   Los parámetros de vulnerabilidad deben ser actualizados periódicamente por epidemiólogos y trabajadores sociales mediante trabajo de campo para evitar tomar decisiones basadas en información obsoleta.

---

## 12. Despliegue en Producción (Docker en Render + MySQL Aiven)

### 12.1. Arquitectura de Despliegue
- **Compute:** Render Web Service (despliegue autónomo vía `Dockerfile`).
- **Base de Datos:** MySQL 8.x gestionado en Aiven Cloud con SSL forzado.
- **Persistencia de Autenticación:** Claves criptográficas de Passport cargadas desde variables de entorno para que los tokens sobrevivan a reinicios de contenedores efímeros.

### 12.2. Variables de Entorno Requeridas en Render
Configurar en el panel de Render (**Environment Variables**):

| Variable | Descripción / Ejemplo |
|---|---|
| `APP_NAME` | `SaludRuralApi` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | Clave generada con `php artisan key:generate --show` |
| `APP_URL` | URL pública asignada por Render (`https://tu-servicio.onrender.com`) |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | Host de Aiven (ej. `proyectosocial-...aivencloud.com`) |
| `DB_PORT` | Puerto de Aiven (ej. `16256`) |
| `DB_DATABASE` | `defaultdb` |
| `DB_USERNAME` | Usuario de Aiven (ej. `avnadmin`) |
| `DB_PASSWORD` | Contraseña provista por Aiven |
| `MYSQL_SSL_VERIFY_SERVER_CERT` | `false` (o proveer certificado en `MYSQL_ATTR_SSL_CA`) |
| `RUN_MIGRATIONS` | `true` (ejecuta migraciones automáticamente en el arranque) |
| `PASSPORT_PRIVATE_KEY` | Contenido de `oauth-private.key` en una línea con `\n` |
| `PASSPORT_PUBLIC_KEY` | Contenido de `oauth-public.key` en una línea con `\n` |

### 12.3. Configuración de Claves Passport para Contenedores Efímeros
Para evitar que Render regenere las claves en cada reinicio (lo que invalidaría todos los tokens de los usuarios):

1. Exportar las claves locales existentes:
```bash
# Copiar clave privada para Render:
awk '{printf "%s\\n", $0}' storage/oauth-private.key

# Copiar clave pública para Render:
awk '{printf "%s\\n", $0}' storage/oauth-public.key
```
2. Pegar los valores en las variables `PASSPORT_PRIVATE_KEY` y `PASSPORT_PUBLIC_KEY` en Render.
3. Crear el cliente personal en la base de datos de producción **una sola vez**:
```bash
php artisan passport:client --personal --name="Salud Rural Producción" --provider=users --no-interaction
```
Al quedar almacenado en Aiven MySQL, el cliente OAuth perdura permanentemente.

### 12.4. Pasos para Desplegar en Render
1. Conectar el repositorio de GitHub/GitLab en [Render](https://dashboard.render.com).
2. Crear un **Web Service**.
3. Seleccionar **Runtime: Docker**.
4. Render detectará automáticamente el `Dockerfile` y `docker-entrypoint.sh`.
5. En la sección **Advanced -> Environment Variables**, ingresar todas las variables listadas en el apartado 12.2.
6. Desplegar. El script `docker-entrypoint.sh` ajustará el puerto dinámico `$PORT`, optimizará la configuración de Laravel y ejecutará `php artisan migrate --force`.
