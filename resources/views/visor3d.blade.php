<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Visor 3D - Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Componente model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: system-ui, sans-serif;
            background: #0b1220;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin: 18px 0 10px;
        }

        model-viewer {
            width: 92%;
            height: 78vh;
            border-radius: 12px;
            background: #111827;
            box-shadow: 0 0 20px rgba(0, 0, 0, .4);
        }

        .toolbar {
            margin: 10px 0 18px;
            display: flex;
            gap: 10px;
        }

        .btn {
            border: 1px solid #334155;
            background: #1f2937;
            color: #e5e7eb;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #374151;
        }
    </style>
</head>

<body>
    <h1>Visor 3D en Laravel</h1>

    <div class="toolbar">
        <button class="btn" id="zoomOut">Zoom −</button>
        <button class="btn" id="zoomIn">Zoom +</button>
        <button class="btn" id="reset">Reset vista</button>
    </div>

    <model-viewer id="mv" src="{{ $src }}" alt="Modelo 3D" camera-controls auto-rotate
        shadow-intensity="1" ar ar-modes="webxr scene-viewer quick-look" min-camera-orbit="auto auto 1m"
        max-camera-orbit="auto auto 100m" min-field-of-view="10deg" max-field-of-view="75deg">
    </model-viewer>

    <script type="module">
        const mv = document.getElementById('mv');

        // Lee límites (en metros) desde atributos
        const minRadius = parseFloat((mv.getAttribute('min-camera-orbit') || 'auto auto 1m').split(' ').pop().replace('m',
            '')) || 1;
        const maxRadius = parseFloat((mv.getAttribute('max-camera-orbit') || 'auto auto 100m').split(' ').pop().replace('m',
            '')) || 100;

        // Pasos de zoom: multiplicadores (suaves)
        const ZOOM_IN_FACTOR = 0.85; // 15% más cerca
        const ZOOM_OUT_FACTOR = 1.15; // 15% más lejos

        function clamp(v, a, b) {
            return Math.max(a, Math.min(b, v));
        }

        function setRadius(newR) {
            // Obtenemos el orbit actual (rad, rad, m)
            const {
                theta,
                phi,
                radius
            } = mv.getCameraOrbit();
            const r = clamp(newR, minRadius, maxRadius);
            mv.cameraOrbit = `${theta}rad ${phi}rad ${r}m`;
        }

        document.getElementById('zoomIn').addEventListener('click', () => {
            const {
                radius
            } = mv.getCameraOrbit();
            setRadius(radius * ZOOM_IN_FACTOR);
        });

        document.getElementById('zoomOut').addEventListener('click', () => {
            const {
                radius
            } = mv.getCameraOrbit();
            setRadius(radius * ZOOM_OUT_FACTOR);
        });

        document.getElementById('reset').addEventListener('click', () => {
            // Vuelve a la meta de cámara por defecto
            mv.resetTurntableRotation();
            mv.jumpCameraToGoal(); // asegura la transición inmediata
        });

        // (Opcional) Ajuste inicial: encuadra el modelo cuando cargue
        mv.addEventListener('load', () => {
            mv.cameraTarget = 'auto';
            mv.jumpCameraToGoal();
        });
    </script>
</body>

</html>
