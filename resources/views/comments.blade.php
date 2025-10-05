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
            /* fondo por si el logo tiene transparencia */
            border: 1px solid var(--arm-border);
            /* coherente con el tema */
            box-shadow: 0 6px 14px rgba(255, 106, 61, .25);
            /* similar al efecto del badge */
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

        /* Badges/Chips */
        .chip {
            background: var(--arm-chip);
            color: var(--arm-text);
            border: 1px solid var(--arm-border);
        }

        .soft-badge,
        .section-title .ico,
        .why-head .ico,
        .info-ico {
            background: var(--arm-accent-soft);
            color: var(--arm-accent);
            border: 1px solid var(--arm-border);
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

        /* Texto y grillas */
        .info-grid {
            margin-top: 16px;
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(12, 1fr);
        }

        .info-card {
            grid-column: span 4 / span 4;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-text small {
            display: block;
            color: var(--arm-text-2);
            font-weight: 700;
            margin-bottom: 4px;
        }

        .info-text b {
            color: var(--arm-text);
        }

        .two-col {
            margin-top: 16px;
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(12, 1fr);
        }

        .section-card {
            grid-column: span 6 / span 6;
            padding: 18px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 8px;
        }

        .section-title h3 {
            margin: 0;
            font-size: 18px;
            color: var(--arm-text);
            font-weight: 800;
        }

        /* Inputs dark */
        .form-control,
        input[type="search"] {
            background: #0F172A;
            color: var(--arm-text);
            border: 1px solid var(--arm-border);
        }

        .form-control:focus {
            background: #121a2f;
            color: var(--arm-text);
            border-color: #334155;
            box-shadow: none;
        }

        /* Loader */
        .loader-bg {
            background: var(--arm-bg);
        }

        .loader-track {
            background: #101826;
        }

        .loader-fill {
            background: var(--arm-accent);
        }

        /* Iconos */
        .ti,
        [data-feather] {
            color: var(--arm-text);
        }

        /* Acentos */
        a,
        .pc-link .pc-mtext {
            transition: .15s ease;
        }

        a:hover {
            color: var(--arm-accent);
        }

        .pc-item.active>.pc-link,
        .pc-item .pc-link.active {
            background: var(--arm-accent-soft);
            color: var(--arm-accent) !important;
        }

        .pc-caption:first-child {
            display: flex !important;
        }

        /* ====== TAMAÑO DEL VISOR 3D ====== */
        .pc-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
        }

        .pc-content h1 {
            margin: 18px 0 8px;
            text-align: center;
            font-weight: 800;
        }

        .toolbar {
            margin: 6px 0 12px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
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

        model-viewer {
            width: 100%;
            max-width: 1400px;
            /* quita esta línea si quieres 100% total */
            height: 85vh;
            /* grande */
            border-radius: 12px;
            background: #111827;
            box-shadow: 0 0 20px rgba(0, 0, 0, .4);
        }

        /* Responsive */
        @media (max-width:1024px) {
            .info-card {
                grid-column: span 6 / span 6;
            }

            .section-card {
                grid-column: span 12 / span 12;
            }
        }

        @media (max-width:640px) {
            .info-card {
                grid-column: span 12 / span 12;
            }
        }
    </style>

    <style>
        .feedback-wrap {
            width: 100%;
            max-width: 1100px;
        }

        .feedback-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 12px 0 6px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border: 1px solid var(--arm-border);
            border-radius: 999px;
            background: var(--arm-chip);
            color: var(--arm-text);
            font-weight: 700;
        }

        .star {
            color: #f59e0b;
        }

        /* amber */
        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: 800;
            background: #0f172a;
            border: 1px solid var(--arm-border);
            color: var(--arm-text-2);
        }

        .comment-card {
            display: flex;
            gap: 14px;
            padding: 14px;
            border: 1px solid var(--arm-border);
            border-radius: 12px;
            background: var(--arm-card);
            box-shadow: var(--arm-shadow);
        }

        .comment-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .chip-sm {
            padding: 3px 8px;
            border: 1px solid var(--arm-border);
            border-radius: 999px;
            background: #0f172a;
            color: var(--arm-text-2);
            font-size: 12px;
        }

        .comment-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--arm-text-2);
        }

        .kudos {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 16px;
            margin-top: 16px;
            width: 100%;
        }

        @media (max-width: 1024px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
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
                    <img src="{{ url('assets/images/logo_armagedon.jpeg') }}" {{-- cambia a .png/.jpeg si aplica --}} alt="Armagedon"
                        class="arm-logo" />
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
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Buscar…">
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
                        <button id="themeToggle" class="pc-head-link bg-transparent border-0" title="Cambiar tema"
                            aria-label="Cambiar tema">
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
                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                            aria-expanded="false">
                            <i class="ti ti-user" style="font-size:18px; margin-right:6px;"></i>
                            <span><b>Usuario</b></span>
                        </a>

                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1 align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="user-avtar wid-35 d-flex align-items-center justify-content-center rounded-circle"
                                            style="background:#0f172a;border:1px solid var(--arm-border);">
                                            <i class="ti ti-user"
                                                style="font-size:20px; color:var(--arm-text-2);"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">Usuario</h6>
                                    </div>
                                    <form method="POST" action="" class="ms-auto">
                                        @csrf
                                        <button type="submit" class="pc-head-link bg-transparent border-0 p-0"
                                            title="Salir">
                                            <i class="ti ti-power" style="color:#ef4444;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist"></ul>
                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel"
                                    aria-labelledby="drp-t1" tabindex="0">
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-edit-circle"></i><span>Editar perfil</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-user"></i><span>Ver
                                            perfil</span></a>
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-clipboard-list"></i><span>Datos personales</span></a>
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-wallet"></i><span>Facturación</span></a>
                                </div>
                                <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2"
                                    tabindex="0">
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-help"></i><span>Soporte</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ti ti-lock"></i><span>Centro de
                                            privacidad</span></a>
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-messages"></i><span>Comentarios</span></a>
                                    <a href="#!" class="dropdown-item"><i
                                            class="ti ti-list"></i><span>Historial</span></a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </header>

    @php
        // Si viene ?src=URL completa la usamos tal cual.
        // Si no, aceptamos ?file=archivo.glb y lo resolvemos contra storage/public/models
        $src = request('src');
        if (!$src) {
            $file = trim(request('file', 'modelo.glb'), '/'); // por defecto
            // IMPORTANTE: url() respeta APP_URL incluso si la app está en subcarpeta
            $src = url('storage/models/' . $file);
        }
    @endphp

    {{-- CONTENIDO --}}
    <div class="pc-container">
        <div class="pc-content">

            <div class="feedback-wrap">

                <!-- Header & quick stats -->
                <div class="feedback-header">
                    <div>
                        <h2 style="margin:0; font-weight:800;">Community Feedback</h2>
                        <small class="text-secondary">Read-only showcase of positive comments from visitors</small>
                    </div>
                    <div style="display:flex; gap:8px; flex-wrap:wrap;">
                        <span class="pill"><i class="ti ti-users"></i> 1,284 visitors</span>
                        <span class="pill"><i class="ti ti-thumb-up"></i> 96% satisfaction</span>
                        <span class="pill"><i class="ti ti-star-filled star"></i> 4.8 avg</span>
                    </div>
                </div>

                <div class="grid-2">

                    <!-- LEFT: comments list -->
                    <div style="display:grid; gap:12px;">

                        <!-- 1 -->
                        <div class="comment-card">
                            <div class="avatar">AM</div>
                            <div style="flex:1;">
                                <div class="comment-meta">
                                    <b>Andrea Muñoz</b><span class="text-secondary">· 🇵🇪 Lima</span>
                                    <span class="chip-sm"><i class="ti ti-clock"></i> 2h ago</span>
                                    <span>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star star"></i>
                                    </span>
                                </div>
                                <p style="margin:6px 0 10px;">
                                    Love the NASA integration! Charts are clear and the educational mode made the
                                    physics easy to grasp.
                                </p>
                                <div class="comment-actions">
                                    <span class="kudos"><i class="ti ti-thumb-up"></i> 34</span>
                                    <span class="chip-sm">UI/UX</span>
                                    <span class="chip-sm">NASA Feed</span>
                                    <span class="chip-sm">Education</span>
                                </div>
                            </div>
                        </div>

                        <!-- 2 -->
                        <div class="comment-card">
                            <div class="avatar">JP</div>
                            <div style="flex:1;">
                                <div class="comment-meta">
                                    <b>Juan Pérez</b><span class="text-secondary">· 🇲🇽 CDMX</span>
                                    <span class="chip-sm"><i class="ti ti-clock"></i> 1 day ago</span>
                                    <span>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                    </span>
                                </div>
                                <p style="margin:6px 0 10px;">
                                    The 3D simulation is 🔥. Being able to compare impact energy against Tsar Bomba
                                    really puts scale in context.
                                </p>
                                <div class="comment-actions">
                                    <span class="kudos"><i class="ti ti-thumb-up"></i> 52</span>
                                    <span class="chip-sm">3D</span>
                                    <span class="chip-sm">Physics</span>
                                </div>
                            </div>
                        </div>

                        <!-- 3 -->
                        <div class="comment-card">
                            <div class="avatar">VL</div>
                            <div style="flex:1;">
                                <div class="comment-meta">
                                    <b>Valentina López</b><span class="text-secondary">· 🇨🇱 Santiago</span>
                                    <span class="chip-sm"><i class="ti ti-clock"></i> 3 days ago</span>
                                    <span>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star star"></i>
                                    </span>
                                </div>
                                <p style="margin:6px 0 10px;">
                                    Clean dashboard and consistent dark theme. Loved the Top-5 diameter chart and
                                    tooltips with speed.
                                </p>
                                <div class="comment-actions">
                                    <span class="kudos"><i class="ti ti-thumb-up"></i> 19</span>
                                    <span class="chip-sm">Charts</span>
                                    <span class="chip-sm">Dark Mode</span>
                                </div>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="comment-card">
                            <div class="avatar">RS</div>
                            <div style="flex:1;">
                                <div class="comment-meta">
                                    <b>Roberto Silva</b><span class="text-secondary">· 🇧🇷 São Paulo</span>
                                    <span class="chip-sm"><i class="ti ti-clock"></i> 1 week ago</span>
                                    <span>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star star"></i>
                                    </span>
                                </div>
                                <p style="margin:6px 0 10px;">
                                    Fragmentation table is a great educational touch. Would love a Caracas scenario
                                    overlay next!
                                </p>
                                <div class="comment-actions">
                                    <span class="kudos"><i class="ti ti-thumb-up"></i> 41</span>
                                    <span class="chip-sm">Mitigation</span>
                                    <span class="chip-sm">Education</span>
                                </div>
                            </div>
                        </div>

                        <!-- 5 -->
                        <div class="comment-card">
                            <div class="avatar">EC</div>
                            <div style="flex:1;">
                                <div class="comment-meta">
                                    <b>Elena Castillo</b><span class="text-secondary">· 🇪🇸 Madrid</span>
                                    <span class="chip-sm"><i class="ti ti-clock"></i> 2 weeks ago</span>
                                    <span>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                        <i class="ti ti-star-filled star"></i>
                                    </span>
                                </div>
                                <p style="margin:6px 0 10px;">
                                    The app tells a story in 30 seconds. Perfect for hackathon judging. Great work!
                                </p>
                                <div class="comment-actions">
                                    <span class="kudos"><i class="ti ti-thumb-up"></i> 67</span>
                                    <span class="chip-sm">Pitch Ready</span>
                                </div>
                            </div>
                        </div>

                        <!-- pagination (mock) -->
                        <div style="display:flex; gap:8px; justify-content:flex-end;">
                            <button class="btn" disabled><i class="ti ti-chevron-left"></i> Prev</button>
                            <button class="btn">Next <i class="ti ti-chevron-right"></i></button>
                        </div>
                    </div>

                    <!-- RIGHT: highlights -->
                    <div class="section-card">
                        <div class="section-title">
                            <div class="soft-badge rounded p-2">💡</div>
                            <h3>Highlights</h3>
                        </div>
                        <ul style="margin:0; padding-left:18px; line-height:1.8;">
                            <li>Users praise the <b>NASA feed</b> and <b>3D simulation</b>.</li>
                            <li><b>4.8/5</b> average rating across last 2 weeks.</li>
                            <li>Most liked features: <b>Energy comparison</b>, <b>Top-5 chart</b>, and <b>Dark
                                    theme</b>.</li>
                        </ul>
                        <hr style="border-color:var(--arm-border);">
                        <div style="display:flex; gap:8px; flex-wrap:wrap;">
                            <span class="chip-sm">NASA</span>
                            <span class="chip-sm">3D</span>
                            <span class="chip-sm">Charts</span>
                            <span class="chip-sm">Education</span>
                            <span class="chip-sm">Mitigation</span>
                            <span class="chip-sm">UX</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- JS base --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ url('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/dashboard-default.js') }}"></script>
    <script src="{{ url('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ url('assets/js/pcoded.js') }}"></script>
    <script src="{{ url('assets/js/plugins/feather.min.js') }}"></script>

    <script>
        layout_change('dark');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Public-Sans");

        (function() {
            const root = document.documentElement;
            const btn = document.getElementById('themeToggle');
            const icon = document.getElementById('themeIcon');
            const saved = localStorage.getItem('arm-theme');

            function apply(theme) {
                root.setAttribute('data-theme', theme);
                try {
                    layout_change(theme);
                } catch (e) {}
                if (theme === 'dark') {
                    icon.classList.remove('ti-sun');
                    icon.classList.add('ti-moon');
                } else {
                    icon.classList.remove('ti-moon');
                    icon.classList.add('ti-sun');
                }
                localStorage.setItem('arm-theme', theme);
            }

            apply(saved === 'light' ? 'light' : 'dark');

            btn?.addEventListener('click', function() {
                const current = root.getAttribute('data-theme') || 'dark';
                apply(current === 'dark' ? 'light' : 'dark');
            });
        })();
    </script>

    <script type="module">
        const mv = document.getElementById('mv');

        // Log de errores del visor (si algo falla verás el motivo exacto)
        mv.addEventListener('error', (ev) => {
            console.error('[model-viewer:error]', ev?.detail?.type, ev?.detail?.message);
        });

        const parseMeters = s => parseFloat((s || '').toString().split(' ').pop().replace('m', '')) || NaN;

        const minRadius = parseMeters(mv.getAttribute('min-camera-orbit')) || 1;
        const maxRadius = parseMeters(mv.getAttribute('max-camera-orbit')) || 100;

        const ZOOM_IN_FACTOR = 0.85; // 15% más cerca
        const ZOOM_OUT_FACTOR = 1.15; // 15% más lejos

        const clamp = (v, a, b) => Math.max(a, Math.min(b, v));

        function setRadius(newR) {
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
            mv.resetTurntableRotation();
            mv.jumpCameraToGoal();
        });

        mv.addEventListener('load', () => {
            mv.cameraTarget = 'auto';
            mv.jumpCameraToGoal();
        });
    </script>

    <script>
        (() => {
            // Fix por si no existe el <model-viewer id="mv"> en esta vista
            // (tu script de model-viewer al final del archivo lo usa).
            // Evita errores en consola.
            const mv = document.getElementById('mv');
            if (!mv) {
                /* no-op */
            }

            const $ = (id) => document.getElementById(id);
            const endpoint = `{{ url('/api/nasa') }}`;

            let DATA = [];
            let charts = {
                pie: null,
                bar: null,
                line: null
            };

            // Física básica para energía (MT TNT)
            function energiaMT(diam_m, vel_kms, rho = 3000) {
                const D = Number(diam_m);
                const v = Number(vel_kms) * 1000;
                if (!D || !v) return 0;
                const m = rho * (4 / 3) * Math.PI * Math.pow(D / 2, 3);
                const J = 0.5 * m * v * v;
                return J / 4.184e15; // a MT TNT
            }

            // Heurística educativa para recomendación de rendimiento nuclear (fragmentación)
            function rendimientoNuclearRecomendado(mtImpacto) {
                // Mantenerlo en 40–400 MT (rango educativo)
                const est = Math.max(40, Math.min(400, mtImpacto / 30));
                return Number(est.toFixed(1));
            }

            function fmt(n, d = 2) {
                const x = Number(n);
                return Number.isFinite(x) ? x.toLocaleString(undefined, {
                    maximumFractionDigits: d
                }) : '–';
            }

            function setKPIs(data) {
                if (!Array.isArray(data) || data.length === 0) {
                    $('kpiCount').textContent = '0';
                    $('kpiDates').textContent = '–';
                    $('kpiEnergy').textContent = '–';
                    return;
                }
                // rango de fechas del feed
                const dates = [...new Set(data.map(x => x.date))].sort();
                $('kpiCount').textContent = data.length;
                $('kpiDates').textContent = dates.join(' → ');
            }

            function renderSelect(data) {
                const sel = $('neoSelect');
                sel.innerHTML = data
                    .map((a, i) =>
                        `<option value="${i}">${a.name} — ${fmt(a.diameter,1)} m — ${fmt(a.velocity,2)} km/s</option>`)
                    .join('');
            }

            function pieEnergy(selected) {
                const tsar = 50; // ~Tsar Bomba
                const mt = energiaMT(selected.diameter, selected.velocity);
                $('kpiEnergy').textContent = fmt(mt, 1);

                const ctx = $('chartEnergyPie');
                charts.pie && charts.pie.destroy();
                charts.pie = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Asteroide (MT)', 'Tsar Bomba (50 MT)'],
                        datasets: [{
                            data: [mt, tsar]
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#E5E7EB'
                                }
                            }
                        }
                    }
                });
            }

            function barDV(data) {
                // Top 5 por diámetro
                const top = [...data].sort((a, b) => b.diameter - a.diameter).slice(0, 5);
                const labels = top.map(a => a.name);
                const diam = top.map(a => a.diameter);
                const vels = top.map(a => a.velocity);

                const ctx = $('chartBarDV');
                charts.bar && charts.bar.destroy();
                charts.bar = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Diámetro (m)',
                            data: diam
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#E5E7EB'
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) =>
                                        ` Diámetro: ${fmt(ctx.raw)} m | Vel.: ${fmt(vels[ctx.dataIndex],2)} km/s`
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: '#E5E7EB'
                                }
                            },
                            y: {
                                ticks: {
                                    color: '#E5E7EB'
                                }
                            }
                        }
                    }
                });
            }

            function lineTimeline(data) {
                // Conteo por fecha dentro del feed
                const map = {};
                data.forEach(a => map[a.date] = (map[a.date] || 0) + 1);
                const labels = Object.keys(map).sort();
                const counts = labels.map(k => map[k]);

                const ctx = $('chartTimeline');
                charts.line && charts.line.destroy();
                charts.line = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Asteroides por fecha',
                            data: counts,
                            tension: 0.3
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#E5E7EB'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: '#E5E7EB'
                                }
                            },
                            y: {
                                ticks: {
                                    color: '#E5E7EB'
                                },
                                beginAtZero: true,
                                precision: 0
                            }
                        }
                    }
                });
            }

            function renderFragRow(a) {
                const mt = energiaMT(a.diameter, a.velocity);
                const yrec = rendimientoNuclearRecomendado(mt);
                const strategy = (mt >= 1000) ? 'Fragmentación (plazo corto)' : 'Deflexión (si hay años)';
                return `
      <tr>
        <td>${a.name}</td>
        <td>${fmt(a.diameter,1)}</td>
        <td>${fmt(a.velocity,2)}</td>
        <td>${fmt(mt,1)}</td>
        <td>${fmt(yrec,1)}</td>
        <td>${strategy}</td>
      </tr>`;
            }

            function updateAll(selectedIdx = 0) {
                if (!DATA.length) return;
                const selected = DATA[selectedIdx] || DATA[0];
                pieEnergy(selected);
                barDV(DATA);
                lineTimeline(DATA);
                $('fragTable').innerHTML = renderFragRow(selected);
                $('neoSelect').value = String(selectedIdx);
            }

            async function loadFeed() {
                try {
                    $('fragTable').innerHTML = `<tr><td colspan="6">Cargando datos de la NASA…</td></tr>`;
                    const res = await fetch(endpoint, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    });
                    if (!res.ok) throw new Error('API no disponible. Status: ' + res.status);
                    DATA = await res.json();
                    if (!Array.isArray(DATA) || DATA.length === 0) {
                        $('fragTable').innerHTML = `<tr><td colspan="6">Sin datos.</td></tr>`;
                        return;
                    }
                    setKPIs(DATA);
                    renderSelect(DATA);
                    updateAll(0);
                } catch (e) {
                    console.error(e);
                    $('fragTable').innerHTML =
                        `<tr><td colspan="6" class="text-danger">Error cargando /api/nasa</td></tr>`;
                }
            }

            // eventos
            $('reloadNasa').addEventListener('click', loadFeed);
            $('neoSelect').addEventListener('change', (e) => updateAll(Number(e.target.value) || 0));

            // arranque
            loadFeed();
        })();
    </script>

    @stack('scripts')
</body>

</html>
