{{-- resources/views/layouts/cliente.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard • Armagedon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Armagedon Dashboard">
    <meta name="keywords" content="Armagedon, Dashboard, Admin">
    <meta name="author" content="Armagedon">
    <link rel="icon" href="{{ url('assets/images/logoAKL-512.png') }}" type="image/png">

    {{-- Fuentes y estilos base del theme --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <link rel="stylesheet" href="{{ url('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ url('assets/css/style-preset.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    {{-- model-viewer --}}
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    {{-- ====== Armagedon Dark Layer (override) ====== --}}
    <style>
        :root {
            --arm-bg: #0B1220;
            --arm-bg-2: #0F172A;
            --arm-card: #111827;
            --arm-border: #1F2937;
            --arm-text: #E5E7EB;
            --arm-text-2: #94A3B8;
            --arm-accent: #FF6A3D;
            --arm-accent-soft: #3b251f;
            --arm-chip: #1E293B;
            --arm-hover: #0E1627;
            --arm-shadow: 0 8px 20px rgba(0, 0, 0, .35);
            --glass: rgba(17, 24, 39, .72);
            --glass-bd: rgba(148, 163, 184, .12);
        }

        html[data-theme="dark"] body {
            background: var(--arm-bg);
            color: var(--arm-text);
        }

        body {
            background: var(--arm-bg);
            color: var(--arm-text);
            font-family: 'Public Sans', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        .brand-arm .arm-logo {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            object-fit: cover;
            background: #0b0b0b;
            border: 1px solid var(--arm-border);
            box-shadow: 0 6px 14px rgba(255, 106, 61, .25);
        }

        .pc-sidebar,
        .navbar-wrapper,
        .m-header {
            background: var(--arm-bg-2) !important;
            border-right: 1px solid var(--arm-border);
        }

        .pc-navbar .pc-item .pc-link,
        .pc-navbar .pc-caption .pc-mtext {
            color: var(--arm-text) !important;
        }

        .pc-navbar .pc-item .pc-link:hover,
        .pc-navbar .pc-item .pc-link:focus {
            background: var(--arm-hover);
        }

        .pc-header,
        .header-wrapper {
            background: var(--arm-bg-2) !important;
            border-bottom: 1px solid var(--arm-border);
            color: var(--arm-text);
        }

        .pc-head-link,
        .header-search .form-control {
            color: var(--arm-text);
            background: transparent;
        }

        .header-search .form-control::placeholder {
            color: var(--arm-text-2);
        }

        .dropdown-menu {
            background: var(--arm-card);
            border: 1px solid var(--arm-border);
            box-shadow: var(--arm-shadow);
            color: var(--arm-text);
        }

        .dropdown-item {
            color: var(--arm-text);
        }

        .dropdown-item:hover {
            background: var(--arm-hover);
            color: var(--arm-text);
        }

        /* Contenedor */
        .pc-container {
            background: var(--arm-bg);
        }

        .pc-content {
            color: var(--arm-text);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            position: relative;
        }

        /* Tarjetas genéricas */
        .card,
        .card-np,
        .hero-card,
        .section-card,
        .why-card,
        .info-card {
            background: var(--arm-card) !important;
            border: 1px solid var(--arm-border) !important;
            box-shadow: var(--arm-shadow) !important;
            color: var(--arm-text);
        }

        /* Brand */
        .brand-arm {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .arm-badge {
            display: inline-grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--arm-accent);
            color: #0b0b0b;
            font-weight: 900;
            font-size: 13px;
            letter-spacing: .3px;
            box-shadow: 0 6px 14px rgba(255, 106, 61, .25);
        }

        .arm-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .arm-text .title {
            color: var(--arm-text);
            font-weight: 800;
            font-size: 18px;
        }

        .arm-text .subtitle {
            color: var(--arm-text-2);
            font-size: 12px;
            font-weight: 600;
        }

        /* ====== VISOR 3D ====== */
        model-viewer {
            width: 100%;
            max-width: 1400px;
            height: 85vh;
            border-radius: 12px;
            background: #111827;
            box-shadow: 0 0 20px rgba(0, 0, 0, .4);
        }

        /* ====== PANEL KPI (derecha, closable) ====== */
        .kpi-panel {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 360px;
            max-width: calc(100vw - 48px);
            background: var(--glass);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-bd);
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .45);
            overflow: hidden;
            z-index: 30;
            animation: kpi-in .25s ease-out both;
        }

        @keyframes kpi-in {
            from { transform: translateY(-6px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        .kpi-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            background: linear-gradient(180deg, rgba(255, 106, 61, .10), rgba(255, 106, 61, 0));
            border-bottom: 1px solid var(--glass-bd);
        }

        .kpi-head .left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .kpi-head .badge {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--arm-accent);
            color: #0b0b0b;
            font-weight: 900;
            font-size: 12px;
            box-shadow: 0 6px 14px rgba(255, 106, 61, .25);
        }

        .kpi-head h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
        }

        .kpi-close {
            border: none;
            background: transparent;
            color: var(--arm-text-2);
            cursor: pointer;
            border-radius: 8px;
            padding: 6px;
        }

        .kpi-close:hover { background: var(--arm-hover); color: var(--arm-text); }

        .kpi-body {
            padding: 12px 14px 14px;
        }

        .kpi-grid {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(12, 1fr);
        }

        .kpi-card {
            grid-column: span 12 / span 12;
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            gap: 10px;
            background: rgba(2, 6, 23, .55);
            border: 1px solid var(--glass-bd);
            border-radius: 12px;
            padding: 12px;
        }

        .kpi-ico {
            display: grid;
            place-items: center;
            width: 42px; height: 42px;
            border-radius: 10px;
            background: var(--arm-accent-soft);
            color: var(--arm-accent);
            border: 1px solid var(--arm-border);
            font-size: 18px;
        }

        .kpi-text small {
            display: block;
            color: var(--arm-text-2);
            font-weight: 700;
            margin-bottom: 2px;
            letter-spacing: .2px;
        }

        .kpi-text b {
            font-size: 22px;
            font-weight: 900;
            color: var(--arm-text);
        }

        .kpi-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 12px;
        }

        .kpi-foot .hint {
            color: var(--arm-text-2);
            font-size: 12px;
        }

        .kpi-foot .pill {
            background: var(--arm-chip);
            border: 1px solid var(--arm-border);
            color: var(--arm-text-2);
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        /* Re-open FAB */
        .kpi-fab {
            position: absolute;
            bottom: 20px; right: 20px;
            z-index: 20;
            display: none;
        }

        .kpi-fab button {
            border: 1px solid var(--arm-border);
            background: var(--arm-card);
            color: var(--arm-text);
            padding: 10px 12px;
            border-radius: 12px;
            font-weight: 800;
            display: flex; align-items: center; gap: 8px;
            box-shadow: var(--arm-shadow);
        }

        .kpi-fab button:hover { background: #162035; }

        /* Responsive */
        @media (max-width: 1024px) {
            .kpi-panel { width: 320px; }
        }
        @media (max-width: 640px) {
            .kpi-panel {
                position: static;
                width: 100%;
                margin: 8px 18px 0;
            }
            .kpi-fab { position: fixed; }
        }
    </style>

    @stack('styles')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="dark">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header" style="padding:12px;">
                <a href="{{ url('#') }}" class="b-brand brand-arm">
                    <img src="{{ url('assets/images/logo_armagedon.jpeg') }}" alt="Armagedon" class="arm-logo" />
                    <span class="arm-text">
                        <span class="title">Armagedon</span>
                    </span>
                </a>
            </div>

            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <span class="pc-mtext" style="font-weight:800; font-size:15px;">Dashboard</span>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-cube"></i></span>
                            <span class="pc-mtext">Simulación 3D</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ url('kpi') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-planet"></i></span>
                            <span class="pc-mtext">Nasa API Feed</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ url('mode') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-school"></i></span>
                            <span class="pc-mtext">Educational / Gamified Mode</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ url('comments') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-message-circle"></i></span>
                            <span class="pc-mtext">Comments</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ url('settings') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-settings"></i></span>
                            <span class="pc-mtext">Settings</span>
                        </a>
                    </li>

                    <li class="pc-item">
                        <a href="{{ url('logout') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-logout"></i></span>
                            <span class="pc-mtext">Cerrar Sesión</span>
                        </a>
                    </li>
                    {{-- más items --}}
                </ul>
            </div>
        </div>
    </nav>

    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none" placeholder="Buscar…">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="header-search">
                            <i data-feather="search" class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Buscar…">
                        </form>
                    </li>
                </ul>
            </div>

            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="pc-h-item">
                        <button id="themeToggle" class="pc-head-link bg-transparent border-0" title="Cambiar tema" aria-label="Cambiar tema">
                            <i class="ti ti-moon" id="themeIcon"></i>
                        </button>
                    </li>
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-mail"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="ti ti-user" style="font-size:18px; margin-right:6px;"></i>
                            <span><b>Usuario</b></span>
                        </a>

                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="user-avtar wid-35 d-flex align-items-center justify-content-center rounded-circle"
                                             style="background:#0f172a;border:1px solid var(--arm-border);">
                                            <i class="ti ti-user" style="font-size:20px; color:var(--arm-text-2);"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Usuario</h6>
                                    </div>
                                    <form method="POST" action="" class="ms-auto">
                                        @csrf
                                        <button type="submit" class="pc-head-link bg-transparent border-0 p-0" title="Salir">
                                            <i class="ti ti-power" style="color:#ef4444;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist"></ul>
                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                                    <a href="#!" class="dropdown-item"><i class="ti ti-edit-circle"></i><span>Editar perfil</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-user"></i><span>Ver perfil</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-clipboard-list"></i><span>Datos personales</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-wallet"></i><span>Facturación</span></a>
                                </div>
                                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                                    <a href="#!" class="dropdown-item"><i class="ti ti-help"></i><span>Soporte</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-lock"></i><span>Centro de privacidad</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-messages"></i><span>Comentarios</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-list"></i><span>Historial</span></a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </header>

    @php
        // Fuente del modelo 3D
        $src = request('src');
        if (!$src) {
            $file = trim(request('file', 'modelo.glb'), '/');
            $src = url('storage/models/' . $file);
        }

        // KPIs con overrides por querystring
        $kpiEnergy   = floatval(request('energy', 2100));   // MT TNT
        $kpiDistance = floatval(request('distance', 32000)); // km (sobrevuelo 2029)
        $kpiSpeed    = floatval(request('speed', 17));      // km/s (impacto típico)
        $kpiProb     = floatval(request('prob', 0.0));      // %
    @endphp

    {{-- CONTENIDO --}}
    <div class="pc-container">
        <div class="pc-content" id="sceneRoot"
             data-energy="{{ $kpiEnergy }}"
             data-distance="{{ $kpiDistance }}"
             data-speed="{{ $kpiSpeed }}"
             data-prob="{{ $kpiProb }}">
            
            {{-- PANEL KPI (derecha, sobre el visor) --}}
            <aside class="kpi-panel" id="kpiPanel" aria-label="Panel de indicadores de misión">
                <div class="kpi-head">
                    <div class="left">
                        <div class="badge">KPI</div>
                        <h4>Apophis • Indicadores</h4>
                    </div>
                    <button class="kpi-close" id="kpiClose" title="Ocultar panel" aria-label="Ocultar panel">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="kpi-body">
                    <div class="kpi-grid">

                        <div class="kpi-card">
                            <div class="kpi-ico"><i class="ti ti-flame"></i></div>
                            <div class="kpi-text">
                                <small>Energía total (MT TNT)</small>
                                <b id="kpiEnergy">—</b>
                            </div>
                        </div>

                        <div class="kpi-card">
                            <div class="kpi-ico"><i class="ti ti-arrows-minimize"></i></div>
                            <div class="kpi-text">
                                <small>Distancia mínima (km)</small>
                                <b id="kpiDistance">—</b>
                            </div>
                        </div>

                        <div class="kpi-card">
                            <div class="kpi-ico"><i class="ti ti-rocket"></i></div>
                            <div class="kpi-text">
                                <small>Velocidad orbital (km/s)</small>
                                <b id="kpiSpeed">—</b>
                            </div>
                        </div>

                        <div class="kpi-card">
                            <div class="kpi-ico"><i class="ti ti-target-arrow"></i></div>
                            <div class="kpi-text">
                                <small>Probabilidad de impacto (%)</small>
                                <b id="kpiProb">—</b>
                            </div>
                        </div>

                    </div>
                    <div class="kpi-foot">
                        <span class="hint"><i class="ti ti-info-circle"></i> Valores editables vía querystring.</span>
                        <span class="pill">2029 flyby • 32 000 km</span>
                    </div>
                </div>
            </aside>

            {{-- FAB para reabrir --}}
            <div class="kpi-fab" id="kpiFab">
                <button type="button" id="kpiOpen" title="Mostrar KPIs">
                    <i class="ti ti-layout-grid"></i> KPIs
                </button>
            </div>

            {{-- VISOR 3D --}}
            <model-viewer id="mv" crossorigin="anonymous" src="{{ $src }}" alt="Modelo 3D"
                camera-controls auto-rotate shadow-intensity="1" ar ar-modes="webxr scene-viewer quick-look"
                min-camera-orbit="auto auto 1m" max-camera-orbit="auto auto 100m" min-field-of-view="10deg"
                max-field-of-view="75deg">
            </model-viewer>
        </div>
    </div>

    {{-- JS base --}}
    <script src="{{ url('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/dashboard-default.js') }}"></script>
    <script src="{{ url('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ url('assets/js/pcoded.js') }}"></script>
    <script src="{{ url('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        // ====== Tema
        layout_change('dark');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Public-Sans");

        (function () {
            const root = document.documentElement;
            const btn = document.getElementById('themeToggle');
            const icon = document.getElementById('themeIcon');
            const saved = localStorage.getItem('arm-theme');

            function apply(theme) {
                root.setAttribute('data-theme', theme);
                try { layout_change(theme); } catch (e) {}
                if (theme === 'dark') {
                    icon.classList.remove('ti-sun'); icon.classList.add('ti-moon');
                } else {
                    icon.classList.remove('ti-moon'); icon.classList.add('ti-sun');
                }
                localStorage.setItem('arm-theme', theme);
            }
            apply(saved === 'light' ? 'light' : 'dark');

            btn?.addEventListener('click', function () {
                const current = root.getAttribute('data-theme') || 'dark';
                apply(current === 'dark' ? 'light' : 'dark');
            });
        })();
    </script>

    <script type="module">
        // ====== model-viewer helpers (con logs de error)
        const mv = document.getElementById('mv');
        mv.addEventListener('error', (ev) => {
            console.error('[model-viewer:error]', ev?.detail?.type, ev?.detail?.message);
        });

        const parseMeters = s => parseFloat((s || '').toString().split(' ').pop().replace('m', '')) || NaN;
        const minRadius = parseMeters(mv.getAttribute('min-camera-orbit')) || 1;
        const maxRadius = parseMeters(mv.getAttribute('max-camera-orbit')) || 100;

        const ZOOM_IN_FACTOR = 0.85;
        const ZOOM_OUT_FACTOR = 1.15;
        const clamp = (v, a, b) => Math.max(a, Math.min(b, v));

        function setRadius(newR) {
            const { theta, phi, radius } = mv.getCameraOrbit();
            const r = clamp(newR, minRadius, maxRadius);
            mv.cameraOrbit = `${theta}rad ${phi}rad ${r}m`;
        }

        mv.addEventListener('load', () => {
            mv.cameraTarget = 'auto';
            mv.jumpCameraToGoal();
        });

        // ====== KPI panel logic
        const sceneRoot = document.getElementById('sceneRoot');
        const kpiPanel  = document.getElementById('kpiPanel');
        const kpiFab    = document.getElementById('kpiFab');
        const kpiClose  = document.getElementById('kpiClose');
        const kpiOpen   = document.getElementById('kpiOpen');

        const elEnergy   = document.getElementById('kpiEnergy');
        const elDistance = document.getElementById('kpiDistance');
        const elSpeed    = document.getElementById('kpiSpeed');
        const elProb     = document.getElementById('kpiProb');

        // Formateo bonito
        const nf0 = new Intl.NumberFormat('es-PE', { maximumFractionDigits: 0 });
        const nf1 = new Intl.NumberFormat('es-PE', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
        const nf2 = new Intl.NumberFormat('es-PE', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        const energy   = Number(sceneRoot.dataset.energy || 2100);
        const distance = Number(sceneRoot.dataset.distance || 32000);
        const speed    = Number(sceneRoot.dataset.speed || 17);
        const prob     = Number(sceneRoot.dataset.prob || 0);

        // Contadores suaves (sin lib externa)
        function tweenNumber(el, from, to, ms, fmt = (x)=>x) {
            const start = performance.now();
            function step(t) {
                const k = Math.min(1, (t - start) / ms);
                const v = from + (to - from) * (0.5 - Math.cos(Math.PI * k) / 2); // ease
                el.textContent = fmt(v);
                if (k < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }

        // Pinta valores
        tweenNumber(elEnergy, 0, energy, 700, v => nf0.format(v));
        tweenNumber(elDistance, 0, distance, 700, v => nf0.format(v));
        tweenNumber(elSpeed, 0, speed, 700, v => nf1.format(v));
        tweenNumber(elProb, 0, prob, 700, v => nf2.format(v));

        // Abrir / cerrar
        function closePanel() {
            kpiPanel.style.display = 'none';
            kpiFab.style.display = 'block';
        }
        function openPanel() {
            kpiPanel.style.display = 'block';
            kpiFab.style.display = 'none';
        }
        kpiClose.addEventListener('click', closePanel);
        kpiOpen.addEventListener('click', openPanel);

        // Si pantalla chica, mostramos el panel arriba del visor (ya responsive por CSS)
        // y dejamos el FAB por si el usuario lo oculta.
    </script>

    @stack('scripts')
</body>
</html>
