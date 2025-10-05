<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>NASA Asteroides - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">

    <div class="container py-4">
        <h2 class="text-center mb-4">☄️ Panel de Asteroides Cercanos - NASA NeoWs API</h2>

        <div class="card bg-secondary mb-4">
            <div class="card-header fw-bold">🛰️ Datos de Asteroides Cercanos</div>
            <div class="card-body">
                <button class="btn btn-warning mb-3" onclick="loadAsteroids()">Cargar Datos NASA</button>
                <div class="table-responsive">
                    <table class="table table-dark table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Diámetro (m)</th>
                                <th>Velocidad (km/s)</th>
                                <th>Distancia (millones km)</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody id="asteroidTable">
                            <tr>
                                <td colspan="5">Presiona el botón para cargar datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Autocargar al abrir la página
            loadAsteroids();
        });

        async function loadAsteroids() {
            const btn = document.querySelector('.btn.btn-warning');
            const tbody = document.getElementById('asteroidTable');

            try {
                // UI: estado cargando
                if (btn) {
                    btn.disabled = true;
                    btn.textContent = 'Cargando...';
                }
                tbody.innerHTML = `<tr><td colspan="5">Cargando datos de la NASA...</td></tr>`;

                // Usa url() de Blade para evitar problemas de subcarpetas (/public, etc.)
                const endpoint = `{{ url('/api/nasa') }}`;
                const res = await fetch(endpoint, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!res.ok) {
                    throw new Error('Respuesta no OK del servidor: ' + res.status);
                }

                const data = await res.json();
                if (!Array.isArray(data) || data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="5">No hay asteroides en el rango consultado.</td></tr>`;
                    return;
                }

                // Render
                tbody.innerHTML = data.map(a => `
      <tr>
        <td>${a.name ?? '-'}</td>
        <td>${num(a.diameter)}</td>
        <td>${num(a.velocity)}</td>
        <td>${num(a.distance)}</td>
        <td>${a.date ?? '-'}</td>
      </tr>
    `).join('');

            } catch (err) {
                console.error(err);
                tbody.innerHTML =
                    `<tr><td colspan="5" class="text-danger">Error al cargar los datos de la NASA.</td></tr>`;
                alert('Error al cargar los datos de la NASA. Revisa la consola.');
            } finally {
                // UI: restaurar botón
                if (btn) {
                    btn.disabled = false;
                    btn.textContent = 'Cargar Datos NASA';
                }
            }
        }

        // Helper para formatear números
        function num(v) {
            const n = Number(v);
            if (Number.isNaN(n)) return '-';
            return n.toLocaleString(undefined, {
                maximumFractionDigits: 3
            });
        }
    </script>


</body>

</html>
